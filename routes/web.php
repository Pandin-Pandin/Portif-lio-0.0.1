<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Attendances\AttendancesController;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

// Route::get('/', function () {
//     return ['Laravel' => app()->version()];
// });

Route::middleware(['auth', 'verified'])->group(function () {
});
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');
Route::get('/atendimentos', [AttendancesController::class, 'index'])->name('atendimentos');


require __DIR__ . '/auth.php';
