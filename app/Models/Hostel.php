<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hostel extends Model
{
    use HasFactory;

    protected $fillable = [
        'hostel_name',
        'hostel_image_path',
        'hostel_location',
        'hostel_description',
        'no_of_rooms',
        'room_price',
        'owner_id',
        'user_id'
    ];

    /**
     * Get the owner of the hostel.
     */
    public function owner()
    {
        return $this->belongsTo(Admin::class, 'owner_id');
    }

    /**
     * Get the user who added the hostel.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get the bookings for the hostel.
     */
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
