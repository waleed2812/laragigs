<?php

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
Route::get('/', function () {
  return view('listings', [
    'heading' => 'Latest Listings',
    "listings" => Listing::all(),
  ]);
});


// Find One
Route::get('/listings/{id}', function ($id) {
  $listing = Listing::find($id);
  // if ($listing) {
    return view('listing', [
      'heading' => 'Listing Found.',
      "listing" => $listing,
    ]);
  // } else {
  //   return view('listing', [
  //     'heading' => 'Listing Not Found',
  //     "special" => [],
  //   ]);
  // }
});