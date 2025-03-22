<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
abstract class Controller
{

    public function share()
    {
        return [
            'auth' => [
                'user' => Auth::check() ? [
                    'id' => Auth::id(),
                    'roles' => Auth::user()->getRoleNames(), // Ensure this returns an array
                    'permissions' => Auth::user()->getAllPermissions()->pluck('name'),
                ] : null,
            ],
        ];
     

    }

}
