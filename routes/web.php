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

Route::middleware(['auth'])->group(function () {

    Route::middleware('role:admin_principal')->group(function () {
        Route::get('/admin/dashboard', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard');
    });

    Route::middleware('role:admin_secundario')->group(function () {
        Route::get('/painter/dashboard', function () {
            return view('painter.dashboard');
        })->name('painter.dashboard');
    });

});

use App\Http\Controllers\Admin\ProductController;

Route::middleware(['auth', 'role:admin_principal'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('products', ProductController::class);
});
