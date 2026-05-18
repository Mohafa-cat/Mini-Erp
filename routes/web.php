<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MotorController;
use Illuminate\Support\Facades\Route;
use App\Models\Motor;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $totalMotors = Motor::count();

    $moteurs = Motor::all();
    $totalValue = $moteurs->sum(function($moteur) {
        return $moteur->price * $moteur->stock;
    });

    $lowStockMotors = Motor::where('stock', '<', 5)->get();

    return view('dashboard', compact('totalMotors', 'totalValue', 'lowStockMotors'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('moteurs', MotorController::class);
});

require __DIR__.'/auth.php';
