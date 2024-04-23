<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoommateOfferController;
use App\Http\Controllers\PropretieController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RentOfferController;
use App\Http\Controllers\AdminController;


Route::get('/', function () {
    return view('welcome');
});

Route::resource('dashboard', AdminController::class);


Route::post('reservation/{id}', [RentOfferController::class, 'reservation'])->name('reservation.proprety');
Route::resource('home', RentOfferController::class);


Route::put('dashboardRoommates/activation/{id}', [RoommateOfferController::class, 'activation'])->name('dashboardRoommates.activation');
Route::resource('dashboardRoommates', RoommateOfferController::class);

Route::delete('dashboardLessor/{idImg}/{id}', [PropretieController::class, 'deleteImage'])->name('delete.images');
Route::put('dashboardLessor/activation/{id}', [PropretieController::class, 'activation'])->name('dashboardLessor.activation');
Route::resource('dashboardLessor', PropretieController::class);




Route::get('register', [UserController::class, 'registerView'])->name('registerView');
Route::post('register', [UserController::class, 'store'])->name('register');
Route::get('login', [UserController::class, 'loginview'])->name('loginview');
Route::post('login', [UserController::class, 'login'])->name('login');
Route::get('profil', [UserController::class, 'show'])->name('show.profil');
Route::put('profil/{id}', [UserController::class, 'update'])->name('update.profil');








