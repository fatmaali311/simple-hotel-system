<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'mobile',
        'country',
        'gender',
        'avatar_image',
        'approved_by',
        'approved_at',
    ];

    /**
     * The user (manager or receptionist) who approved this client.
     */
    public function approvedBy()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }

    /**
     * Reservations made by this client.
     */
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    /**
     * Login logs of this client.
     */
    public function loginLogs()
    {
        return $this->hasMany(Login_log::class);
    }
}
