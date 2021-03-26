<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DiningList;
use App\Models\Booking;

class ChefProfile extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'business_name',
        'experience',
        'introduction',
        'business_number',
        'identify_photo',
        'user_id',
    ];
    public function menus()
    {
        return $this->hasMany(DiningList::class,'chef_profile_id','id');
    }

    public function bookings()
    {
        return $this->hasManyThrough(Booking::class, DiningList::class, 'chef_profile_id', 'dining_list_id','id','id');
    }
}
