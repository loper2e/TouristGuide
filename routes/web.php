<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\userController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\placeController;
use App\Http\Controllers\favoritelistController;


Route::get('/', function () {
    return view('HomePage');
});

Route::resource('admin', adminController::class);

Route::resource('places', placeController::class);

Route::resource('favorites', favoritelistController::class);

Route::resource('user', userController::class);




