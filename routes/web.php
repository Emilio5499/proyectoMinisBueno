<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'role:admin_principal'])->group(function () {
    Route::get('/admin', function () {
        return 'Panel Admin Principal';
    });
});

Route::middleware(['auth', 'role:admin_secundario'])->group(function () {
    Route::get('/pintor', function () {
        return 'Panel Pintor';
    });
});
