<?php

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

Route::get('/', function () {
  return view('listings', [
    'heading' => 'Latest Listings',
    "listings" => [
      [
        "id" => 1,
        "title" => "Listing One",
        "description" => "Est stet clita ipsum amet amet sadipscing dolores rebum consetetur amet. Dolor ea et labore ipsum labore ipsum dolore nonumy..",
      ],
      [
        "id" => 2,
        "title" => "Listing Two",
        "description" => "Gild eremites plain say tis shell not but. But so girls her yet present, clay dome long nor was. Blazon.",
      ],
    ]
  ]);
});