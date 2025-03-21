<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


    public function receptionists()
    {
        return $this->hasMany(User::class, 'manager_id')->where('role', 'receptionist');
    }

    public function floors()
    {
        return $this->hasMany(Floor::class, 'manager_id');
    }

    public function rooms()
    {
        return $this->hasMany(Room::class, 'manager_id');
    }

    public function approvedClients()
    {
        return $this->hasMany(Client::class, 'approved_by');
    }

    public function reservationsCreated()
    {
        return $this->hasMany(Reservation::class, 'created_by');
    }
}

