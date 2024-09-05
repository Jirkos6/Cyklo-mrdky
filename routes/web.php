<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RiderController;
use App\Http\Controllers\TeamController;
Route::get('/', function () {
    return view('welcome');
});
Route::get('/riders', [RiderController::class, 'riders'])->name('riders');
Route::get('/riders/{id}', [RiderController::class, 'ridersdata'])->name('ridersdata');
Route::get('/teams', [TeamController::class, 'teams'])->name('teams');
Route::get('/teams/{id}', [TeamController::class, 'teamsdata'])->name('teamsdata');
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
