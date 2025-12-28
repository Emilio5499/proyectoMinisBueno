<?php

use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductPaintedController;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->get('/dashboard', function () {
    $user = auth()->user();

    if ($user->isAdminPrincipal()) {
        return redirect()->route('admin.dashboard');
    }

    if ($user->isAdminSecundario()) {
        return redirect()->route('painter.dashboard');
    }

    abort(403);
})->name('dashboard');

Route::middleware(['auth', 'role:admin_principal'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::resource('users', UserController::class);
    });

Route::middleware(['auth', 'role:admin_principal'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');

        // Productos
        Route::resource('products', ProductController::class);

        // Opción de pintado
        Route::get(
            'products/{product}/painted',
            [ProductPaintedController::class, 'edit']
        )->name('products.painted.edit');

        Route::put(
            'products/{product}/painted',
            [ProductPaintedController::class, 'update']
        )->name('products.painted.update');
    });

Route::middleware(['auth', 'role:admin_secundario'])
    ->prefix('painter')
    ->name('painter.')
    ->group(function () {

        Route::get('/dashboard', function () {
            return view('painter.dashboard');
        })->name('dashboard');
    });
