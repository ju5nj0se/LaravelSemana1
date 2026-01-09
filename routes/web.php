<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;


Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('users', UsersController::class);
    Route::middleware(['auth'])->group(function () {
        Route::get('/audits', [App\Http\Controllers\AuditController::class, 'index'])->name('audits.index');
    });
});

