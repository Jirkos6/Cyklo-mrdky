<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RiderController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\ExcelController;
Route::get('/', [RiderController::class, 'welcome'])->name('welcome');
Route::get('/rider-pdf', [PdfController::class, 'streamRiderPDF']);
Route::get('/riders', [RiderController::class, 'riders'])->name('riders');
Route::get('/riders/{id}', [RiderController::class, 'ridersdata'])->name('ridersdata');
Route::get('/rider/create', [RiderController::class, 'create'])->name('create');
Route::post('/rider', [RiderController::class, 'store']);
Route::get('/edit/{id}', [RiderController::class, 'edit']);
Route::get('/teams', [TeamController::class, 'teams'])->name('teams');
Route::get('/teams/{id}', [TeamController::class, 'teamsdata'])->name('teamsdata');
Route::delete('/delete/{id}', [RiderController::class, 'delete'])->name('delete');
Route::put('/ridersupdate/{id}', [RiderController::class, 'update'])->name('update');
Route::get('/download-pdf', [PdfController::class, 'regeneratePDFs'])->name('download.pdf');
Route::get('/rider/export/', [ExcelController::class, 'export']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
Route::get('/dashboard', [DashboardController::class, 'dashboardgraph'])->name('dashboard');
Route::get('/dashboard-tinymce', [DashboardController::class, 'dashboardtinymce'])->name('dashboard-tinymce');
});
