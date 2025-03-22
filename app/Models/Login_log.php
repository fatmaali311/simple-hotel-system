<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Login_log extends Model
{
    use HasFactory;

    protected $fillable = ['client_id', 'last_login_at'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
