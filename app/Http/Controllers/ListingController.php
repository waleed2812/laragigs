<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{

  // Find All
  public function index()
  {
    return view('listings.index', [
      "listings" => Listing::latest()->filter([request("tag")])->get(),
    ]);
  }
  // Find One
  public function show(Listing $listing)
  {
    return view('listings.show', [
      "listing" => $listing,
    ]);
  }
}