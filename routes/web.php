<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/home', function () {
    return view('/home');
})->middleware(['auth', 'verified'])->name('home');

Route::get('/', function () {
    return view('auth/login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    // Rutas accesibles solo por administradores
    Route::middleware('role:admin')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    // Rutas accesibles por administradores
    Route::resource('marcas', 'App\Http\Controllers\MarcasController');
    Route::resource('vehiculos', 'App\Http\Controllers\VehiculosController');
    Route::resource('reservas', 'App\Http\Controllers\ReservasController');
    Route::resource('reservasDetalle', 'App\Http\Controllers\ReservasDetallesController');
    Route::resource('logos', 'App\Http\Controllers\LogoController');

    // Rutas accesibles solo por empleados
    Route::middleware('role:employee')->group(function () {
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        /* Route::resource('reservas', ReservasController::class);
        Route::resource('reservasDetalle', ReservasDetallesController::class); */
    });
});


require __DIR__.'/auth.php';
