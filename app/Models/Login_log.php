<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Login_log extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'last_login_at',
    ];

    /**
     * The client this login log belongs to.
     */
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
