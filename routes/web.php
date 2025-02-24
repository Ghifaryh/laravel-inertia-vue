<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     // sleep('2');
//     return Inertia::render('Home');
// })->name('home');


// Route::get('/about', function () {
//     return inertia('About', ['user' => 'John Doe']);
// });

// Route::inertia('/about', 'About', ['user' => 'John Doe'])->name('about');

Route::inertia('/', 'Home')->name('home');

Route::middleware('auth')->group(function () {
    Route::inertia('/dashboard', 'Dashboard')->name('dashboard');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware(('guest'))->group(function () {

    Route::inertia('/register', 'Auth/Register')->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    Route::inertia('/login', 'Auth/Login')->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});
