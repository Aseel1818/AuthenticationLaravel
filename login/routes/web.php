<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

// Show login form
Route::get('/login', function () {
    return view('login');
})->name('login');

// Handle login request
Route::post('/login', function (Request $request) {
    $credentials = $request->only('email', 'password');

    // Hardcoded user for authentication (Replace with your own credentials)
    $validUser = [
        'email' => 'admin@example.com',
        'password' => 'password123' // Simple example, do not use in real applications
    ];

    if ($credentials['email'] === $validUser['email'] && $credentials['password'] === $validUser['password']) {
        session(['user' => $credentials['email']]); // Store user in session
        return redirect('/dashboard');
    }

    return back()->withErrors(['Invalid credentials']);
});

// Dashboard (only accessible if logged in)
Route::get('/dashboard', function () {
    if (!session()->has('user')) {
        return redirect('/login')->withErrors(['You must log in first']);
    }
    return view('dashboard');
});

// Logout route
Route::post('/logout', function () {
    session()->forget('user'); // Clear session
    return redirect('/login');
})->name('logout');


Route::get('/signup', function () {
    return view('signup');
})->name('signup');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

