<?php

use App\Http\Controllers\ListingController;
use App\Models\Listing;
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
Route::get('/listings', [ListingController::class, "index"]);

// Listings show create
Route::post('/listings', [ListingController::class, "store"]);
Route::get('/listings/create', [ListingController::class, "create"]);

// Find One
Route::get('/listings/{listing}', [ListingController::class, "show"]);