<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ChefProfile;
class DiningList extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'dining_category',
        'menu_image',
        'menu_title',
        'menu_description',
        'price',
        'location',
        'availability',
        'chef_profile_id'
    ];

    public function creator()
    {
        return $this->belongsTo(ChefProfile::class,'chef_profile_id','id');
    }
}
//->  'DiningList' is booked by user. As result, this model relationship(Eloquent:Relationships) can define in model:User.
//https://laravel.kr/docs/8.x/eloquent-relationships#Model%20%EA%B5%AC%EC%A1%B0
