<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BookingDetail extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'booking_id',
        'phone_number',
        'date',
        'start_time',
        'end_time',
        'num_table',
        'special_req'
    ];

    public function booking(): BelongsTo {
        return $this->belongsTo(Booking::class);
    }

}