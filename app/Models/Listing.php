<?php

namespace App\Models;


class Listing
{

  public static function all()
  {
    return [
      [
        "id" => 1,
        "title" => "Listing One",
        "description" => "Est stet clita ipsum amet amet sadipscing dolores rebum consetetur amet. Dolor ea et labore ipsum labore ipsum dolore nonumy..",
      ],
      [
        "id" => 2,
        "title" => "Listing Two",
        "description" => "Gild eremites plain say tis shell not but. But so girls her yet present, clay dome long nor was. Blazon.",
      ]
    ];
  }
  public static function find($id)
  {
    $listings = self::all();
    foreach ($listings as $listing) {
      if ($listing['id'] == $id) {
        return $listing;
      }
    }
  }
}