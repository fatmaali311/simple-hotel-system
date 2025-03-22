<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'room_id',
        'accompany_number',
        'paid_price',
        'created_by',
    ];

    /**
     * The client who made the reservation.
     */
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    /**
     * The room reserved.
     */
    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    /**
     * The receptionist (user) who created the reservation.
     */
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
