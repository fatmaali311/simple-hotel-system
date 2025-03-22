<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Floor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'number',
        'manager_id',
    ];

    /**
     * The manager who created this floor.
     */
    public function manager()
    {
        return $this->belongsTo(User::class, 'manager_id');
    }

    /**
     * Rooms under this floor.
     */
    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
}
