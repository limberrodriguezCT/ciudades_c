<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

// Rutas protegidas genéricas
Route::middleware(['auth', 'verified', 'prevent-back-history'])->group(function () {
    
    // Redirección dinámica del Dashboard según el rol
    Route::get('/dashboard', function () {
        $role = auth()->user()->role;
        
        if ($role === 'admin') {
            return view('dashboard.admin');
        } elseif ($role === 'emprendedor') {
            return view('dashboard.emprendedor');
        } else {
            return view('dashboard.turista');
        }
    })->name('dashboard');

    // Rutas de Perfil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rutas exclusivas para Administradores
Route::middleware(['auth', 'verified', 'role:admin'])->group(function () {
    // Aquí se agregarán las rutas para gestionar ciudades
});

// Rutas exclusivas para Emprendedores
Route::middleware(['auth', 'verified', 'role:emprendedor'])->group(function () {
    // Aquí se agregarán las rutas para gestionar servicios y agenda
});

require __DIR__.'/auth.php';
