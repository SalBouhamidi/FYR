<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoommateOfferController;
use App\Http\Controllers\RentOfferController;
use App\Http\Controllers\UserController;


Route::get('/', function () {
    return view('welcome');
});
Route::resource('home', RentOfferController::class);

Route::put('dashboardRoommates/activation/{id}', [RoommateOfferController::class, 'activation'])->name('dashboardRoommates.activation');
Route::resource('dashboardRoommates', RoommateOfferController::class);

Route::get('register', [UserController::class, 'registerView'])->name('registerView');
Route::post('register', [UserController::class, 'store'])->name('register');
Route::get('login', [UserController::class, 'loginview'])->name('loginview');
Route::post('login', [UserController::class, 'login'])->name('login');
Route::get('profil', [UserController::class, 'show'])->name('show.profil');
Route::put('profil/{id}', [UserController::class, 'update'])->name('update.profil');







