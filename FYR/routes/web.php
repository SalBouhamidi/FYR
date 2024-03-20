<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OffreColocationController;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('/home', OffreColocationController::class);