<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;


class User extends Authenticatable
{
    use HasFactory, Notifiable;
    use HasRoles;

    protected $fillable = [
        'name',
        'email',
        'password',
        'national_id',
        'avatar_image',
        'manager_id',
        'banned_at',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'banned_at' => 'datetime',
        ];
    }

    /**
     * Returns users created by this user (typically receptionists).
     */
    public function createdUsers()
    {
        return $this->hasMany(User::class, 'manager_id');
    }

    /**
     * The manager who created this user.
     */
    public function manager()
    {
        return $this->belongsTo(User::class, 'manager_id');
    }

    /**
     * Floors created by this user (if manager).
     */
    public function floors()
    {
        return $this->hasMany(Floor::class, 'manager_id');
    }

    /**
     * Rooms created by this user (if manager).
     */
    public function rooms()
    {
        return $this->hasMany(Room::class, 'manager_id');
    }

    /**
     * Clients approved by this user (if manager/receptionist).
     */
    public function approvedClients()
    {
        return $this->hasMany(Client::class, 'approved_by');
    }

    /**
     * Reservations created by this user (if receptionist).
     */
    public function reservationsCreated()
    {
        return $this->hasMany(Reservation::class, 'created_by');
    }
}
