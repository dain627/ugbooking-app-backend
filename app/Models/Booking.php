<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DiningList;

class Booking extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'reservation_name',
        'reservation_email',
        'reservation_number',
        'booking_date',
        'note',
        'user_id',
        'dining_list_id',
     ];
    public function diningLists()
    {
        return $this->belongsTo(DiningList::class,'dining_list_id','id');
    }
}
