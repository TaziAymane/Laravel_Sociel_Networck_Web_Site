<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\InformationsController;
use App\Http\Controllers\ProfileController;
use App\Models\Profile;
use Illuminate\Support\Facades\Route;

Route::get('/',[HomeController::class,'index'])->name('homePage');
Route::get('/Profiles',[ProfileController::class,'index'])->name('profiles.index');
Route::get('/Profile',[ProfileController::class,'Profile'])->name('profile.index');
Route::get('/settings',[InformationsController::class,'index'])->name('seetings.index');
Route::get('/Profiles/{id}',[ProfileController::class,'show'])->name('profiles.show')
->where('id','\d+');
Route::get('/create',[ProfileController::class,'create'])->name('create');
Route::post('/create/store',[ProfileController::class,'store'])->name('store');

Route::get('/edit/{id}',[ProfileController::class,'edit'])->name('profiles.edit');
Route::put('/update/{id}',[ProfileController::class,'update'])->name('profiles.update');


Route::delete('/delete/{id}',[ProfileController::class,'destroy'])->name('profoles.destroy');

?>