<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
 |--------------------------------------------------------------------------
 | Web Routes
 |--------------------------------------------------------------------------
 |
 | Here is where you can register web routes for your application. These
 | routes are loaded by the RouteServiceProvider within a group which
 | contains the "web" middleware group. Now create something great!
 |
 */


// Find All
Route::get('/', [ListingController::class, "index"]);
Route::get('/listings', [ListingController::class, "listings"]);

// Listings show create
Route::post('/listings', [ListingController::class, "store"])->middleware("auth");
Route::get('/listings/create', [ListingController::class, "create"])->middleware("auth");

// Editing
Route::put('/listings/{listing}', [ListingController::class, "update"])->middleware("auth");
Route::get('/listings/edit/{listing}', [ListingController::class, "edit"])->middleware("auth");

// Find One
Route::get('/listings/{listing}', [ListingController::class, "show"]);

// Delete Listing
Route::delete('/listings/{listing}', [ListingController::class, "delete"])->middleware("auth");

// Auth
Route::get('/register', [UserController::class, "create"])->middleware("guest");
Route::post('/register', [UserController::class, "register"])->middleware("guest");
Route::get('/login', [UserController::class, "show"])->middleware("guest");
Route::post('/login', [UserController::class, "login"])->middleware("guest");
Route::delete('/logout', [UserController::class, "logout"])->middleware("auth");