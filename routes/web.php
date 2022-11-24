<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\userController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\placeController;
use App\Http\Controllers\favoritelistController;
use App\Http\Controllers\reviewController;


Route::get('/', function () {
    return view('HomePage');
});

Route::resource('admin', adminController::class);

Route::resource('places', placeController::class);

Route::resource('favorites', favoritelistController::class);

Route::resource('reviews', reviewController::class);

Route::resource('user', userController::class);




