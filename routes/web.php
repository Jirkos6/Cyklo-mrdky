<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RiderController;
Route::get('/', function () {
    return view('welcome');
});
Route::get('/riders', [RiderController::class, 'riders'])->name('riders');
Route::get('/riders/{id}', [RiderController::class, 'ridersdata'])->name('ridersdata');
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
