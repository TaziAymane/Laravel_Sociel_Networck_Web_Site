<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\InformationsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Service\Calcule;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;


// Login Page
Route::get('/login', [LoginController::class, 'show'])->name('login.show');
Route::post('/login', [LoginController::class, 'login'])->name('login');

// logout
Route::get('/logout', [LoginController::class, 'logout'])->name('login.logout');

// index page
Route::get('/', [HomeController::class, 'index'])->name('homePage');

// Profiles Page
Route::get('/Profiles', [ProfileController::class, 'index'])->name('profiles.index');

// Profile Page
Route::get('/Profile', [ProfileController::class, 'Profile'])->name('profile.index')->middleware('auth');

// Settings Page
Route::get('/settings', [InformationsController::class, 'index'])->name('seetings.index')->middleware('auth');

// Show Profile with id 
Route::get('/Profiles/{id}', [ProfileController::class, 'show'])->name('profiles.show')->where('id', '\d+')->middleware('auth');

// Add Profile Page
Route::get('/create', [ProfileController::class, 'create'])->name('create')->middleware('auth');
Route::post('/create/store', [ProfileController::class, 'store'])->name('store')->middleware('auth');

//Update Profile Page
Route::get('/edit/{profile}', [ProfileController::class, 'edit'])->name('profiles.edit')->middleware('auth');
Route::put('/update/{profile}', [ProfileController::class, 'update'])->name('profiles.update')->middleware('auth');

//Delete Profile 
Route::delete('/delete/{id}', [ProfileController::class, 'destroy'])->name('profiles.destroy')->middleware('auth');


Route::get('/hello', function () {
    $res = new Response('hello1',200,['hello']);
    $profile = response()->download('storage/profile/profile.jpg',disposition:'inline');
    return $profile ;
});
