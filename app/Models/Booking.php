<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'check_in',
        'check_out',
        'no_of_rooms',
        'status',
        'hostel_id',
        'user_id'
    ];

    /**
     * Get the user that owns the booking.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the hostel associated with the booking.
     */
    public function hostel()
    {
        return $this->belongsTo(Hostel::class);
    }
}
