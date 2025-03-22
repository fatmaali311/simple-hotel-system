<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'mobile', 'country', 'gender', 'avatar_image', 'approved_by', 'approved_at'
    ];

    // Relations
    public function approver()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function loginLog()
    {
        return $this->hasOne(Login_log::class);
    }
}
