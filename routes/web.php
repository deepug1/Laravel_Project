<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\aboutController;
use App\Http\Controllers\Frontend\contactController;
use App\Http\Controllers\Frontend\indexController;
use App\Http\Controllers\Frontend\serviceController;
// use App\Http\Controllers\Frontend\signinController;
// use App\Http\Controllers\Frontend\signupController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\Frontend\NewBookTestController;




Route::get('/',[indexController::class, 'index']);
Route::get('/book',[indexController::class, 'book'])->middleware('logintoBook');
Route::post('/prescription-form', [indexController::class, 'storeForm']);

// Route::get('/newbook',[NewBookTestController::class, 'newbook'])->middleware('logintoBook');
// Route::post('/book-test', [NewBookTestController::class, 'storeForm']);

Route::get('/about',[aboutController::class, 'index']);
Route::get('/contact',[contactController::class, 'index']);
Route::get('/service',[serviceController::class, 'index']);
Route::get('/signin',[CustomAuthController::class, 'login'])->middleware('alreadylogedin');
Route::get('/signup',[CustomAuthController::class, 'register'])->middleware('alreadylogedin');
Route::post('/register-user',[CustomAuthController::class, 'registerUser'])->name('register-user');
Route::post('/login-user',[CustomAuthController::class, 'loginUser'])->name('login-user');
Route::get('/profile',[CustomAuthController::class, 'profile'])->middleware('isLogedIn');
Route::get('/logout',[CustomAuthController::class,'logout']);
