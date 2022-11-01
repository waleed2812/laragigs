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
      "listings" => Listing::latest()->filter(request(["tag", "search", "location"]))->paginate(10),
    ]);
  }
  // Find One
  public function show(Listing $listing)
  {
    return view('listings.show', [
      "listing" => $listing,
    ]);
  }
  // Show Create
  public function create()
  {
    return view('listings.create');
  }

  // Store Data
  public function store(Request $request)
  {
    $formFields = $request->validate([
      "title" => 'required',
      'company' => 'required',
      "location" => 'required',
      "website" => "required",
      "email" => ["required", "email"],
      "tags" => "required",
      "description" => "required",
    ]);
    if ($request->hasFile("logo")) {
      $formFields["logo"] = $request->file("logo")->store("logos", "public");
    }
    Listing::create($formFields);
    return redirect("/")->with("message", "Listing created successfully.");
  }

  // Edit Data
  public function edit(Listing $listing)
  {
    return view('listings.edit', [
      "listing" => $listing,
    ]);
  }
  // Update Data
  public function update(Request $request, Listing $listing)
  {
    $formFields = $request->validate([
      "title" => 'required',
      'company' => 'required',
      "location" => 'required',
      "website" => "required",
      "email" => ["required", "email"],
      "tags" => "required",
      "description" => "required",
    ]);
    if ($request->hasFile("logo")) {
      $formFields["logo"] = $request->file("logo")->store("logos", "public");
    }
    $listing->update($formFields);
    // return back()->with("message", "Listing updated successfully.");
    return redirect("/listings/" . $listing->id)->with("message", "Listing updated successfully.");
  }
  // Delete Listing

  public function delete(Request $request, Listing $listing)
  {
    $listing->delete();
    return redirect("/")->with("message", "Listing deleted successfully.");
  }
}