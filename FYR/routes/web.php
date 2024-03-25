<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoommateOfferController;
use App\Http\Controllers\RentOfferController;


Route::get('/', function () {
    return view('welcome');
});
Route::resource('/home', RentOfferController::class);
Route::get('/dashboardRoommates/addOffer', [RoommateOfferController::class, 'viewaddoffer'])->name('addOffer');
Route::resource('/dashboardRoommates', RoommateOfferController::class);
