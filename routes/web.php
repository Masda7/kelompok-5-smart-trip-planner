<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DestinationController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/destinations', [DestinationController::class, 'index']);

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ItineraryController;

Route::get('/login', [AuthController::class, 'showLogin']);
Route::get('/register', [AuthController::class, 'showRegister']);
Route::get('/destinations/{id}', [DestinationController::class, 'show']);
Route::get('/itinerary', [ItineraryController::class, 'index']);