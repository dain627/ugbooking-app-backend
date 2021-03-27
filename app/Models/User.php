<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\DiningList;
use App\Models\ChefProfile;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'user_id',
       'password',
       'first_name',
       'last_name',
       'email',
       'contact_number',
       'user_type',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    // create function setPasswordAttribut -> $password Encryption attribute
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    // define Model relationship : User can create one chef_profile as 'user_id':FK.
    // defime 'chef' Method as funtion.
    public function chef()
    {
        return $this->hasOne(ChefProfile::class, 'user_id', 'id');
    }
     // define Model relationship : User can create many bookings as 'user_id':FK.
    //  defime 'bookings' Method as funtion.
    public function bookings()
    {
        return $this->hasMany(Booking::class,'user_id','id');
    }
}
