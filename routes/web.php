<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\InformationsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Models\Profile;
use Illuminate\Support\Facades\Route;


// index page
Route::get('/',[HomeController::class,'index'])->name('homePage');
// Login Page
Route::get('/login',[LoginController::class,'show'])->name('login.show');
Route::post('/login',[LoginController::class,'login'])->name('login');
// logout
Route::get('/logout',[LoginController::class,'logout'])->name('login.logout');
// Profiles Page
Route::get('/Profiles',[ProfileController::class,'index'])->name('profiles.index');
// Profile Page
Route::get('/Profile',[ProfileController::class,'Profile'])->name('profile.index');
// Settings Page
Route::get('/settings',[InformationsController::class,'index'])->name('seetings.index');
// Show Profile with id 
Route::get('/Profiles/{id}',[ProfileController::class,'show'])->name('profiles.show')
->where('id','\d+');
// Add Profile Page
Route::get('/create',[ProfileController::class,'create'])->name('create');
Route::post('/create/store',[ProfileController::class,'store'])->name('store');
//Update Profile Page
Route::get('/edit/{id}',[ProfileController::class,'edit'])->name('profiles.edit');
Route::put('/update/{id}',[ProfileController::class,'update'])->name('profiles.update');
//Delete Profile 
Route::delete('/delete/{id}',[ProfileController::class,'destroy'])->name('profoles.destroy');


?>