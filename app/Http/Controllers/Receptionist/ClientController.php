<?php

namespace App\Http\Controllers\Receptionist;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;


class ClientController extends Controller
{
    // View all clients
    public function index()
    {
        $clients = User::where('role', 'client')->get();
        return response()->json($clients);
    }

    // approve client
    public function approveClient($id)
    {
        $client = User::findOrFail($id);
        $client->status = 'approved';
        $client->save();

        return response()->json(['message' => 'Client approved successfully']);
    }
    

    // reject client
    public function rejectClient($id)
    {
        $client = User::findOrFail($id);
        $client->status = 'rejected';
        $client->save();

        return response()->json(['message' => 'Client rejected successfully']);
    }

    // View client details
    public function show($id)
    {
        $client = User::findOrFail($id);
        return response()->json($client);
    }
}
