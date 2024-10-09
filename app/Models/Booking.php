<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'status',
        'phone_number',
        'date',
        'start_time',
        'end_time',
        'num_guests',
        'num_table',
        'special_req'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
