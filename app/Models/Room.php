<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'capacity',
        'price',
        'floor_id',
        'manager_id',
    ];

    /**
     * The manager who created this room.
     */
    public function manager()
    {
        return $this->belongsTo(User::class, 'manager_id');
    }

    /**
     * The floor this room belongs to.
     */
    public function floor()
    {
        return $this->belongsTo(Floor::class);
    }

    /**
     * Reservations in this room.
     */
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
