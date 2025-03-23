<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\Receptionist\ClientController;
use App\Http\Controllers\Receptionist\ReservationController;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::get('/admin/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/admin', [AdminController::class, 'index'])
    ->middleware(['auth', 'role:admin']);

Route::get('clients', function () {
    return Inertia::render('Clients');
})->middleware(['auth', 'verified'])->name('clients');

//Routes for receptionist
Route::middleware(['auth', 'role:receptionist'])->prefix('receptionist')->group(function () {
    // clients management 
    Route::get('/pending-clients', [ClientController::class, 'pendingClients']);
    Route::post('/approve-client/{id}', [ClientController::class, 'approveClient']);
    Route::post('/reject-client/{id}', [ClientController::class, 'rejectClient']);
    Route::get('/clients', [ClientController::class, 'index']);
    Route::get('/client/{id}', [ClientController::class, 'show']);

    // bookings management 
    Route::get('/client-reservations', [ReservationController::class, 'clientReservations']);
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
