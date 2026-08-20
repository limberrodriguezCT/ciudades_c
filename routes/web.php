<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\PlaceController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Emprendedor\ServiceController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', [PublicController::class, 'index'])->name('home');
Route::get('/circuito/{id}', [PublicController::class, 'show'])->name('public.city.show');

Route::middleware(['auth', 'verified', 'prevent-back-history'])->group(function () {
    
    Route::get('/dashboard', function () {
        $role = Auth::user()->role;
        
        if ($role === 'admin') {
            return view('dashboard');
        } elseif ($role === 'emprendedor') {
            return view('dashboard.emprendedor');
        } else {
            return view('dashboard.turista');
        }
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified', 'role:emprendedor'])->prefix('emprendedor')->name('emprendedor.')->group(function () {
    Route::resource('servicios', ServiceController::class)
        ->parameters(['servicios' => 'service'])
        ->names('services');
});

Route::middleware(['auth', 'verified', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('ciudades', CityController::class)
        ->parameters(['ciudades' => 'city'])
        ->names('cities');
        
    Route::resource('lugares', PlaceController::class)
        ->parameters(['lugares' => 'place'])
        ->names('places');
        
    Route::resource('eventos', EventController::class)
        ->parameters(['eventos' => 'event'])
        ->names('events');
});

require __DIR__.'/auth.php';