<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
  use HasFactory;

  protected $fillable = [
    'title',
    'company',
    'logo',
    'location',
    'website',
    'email',
    'tags',
    'description'
  ];
  public function scopeFilter($query, $filters)
  {
    if ($filters["tag"] ?? false) {
      $query->where('tags', 'like', '%' . request("tag") . '%');
    }

    if ($filters["location"] ?? false) {
      $query->where('location', 'like', '%' . request("location") . '%');
    }

    if ($filters["search"] ?? false) {
      $query->where(
        'title', 'like', '%' . request("search") . '%'
      )->orWhere(
          'description', 'like', '%' . request("search") . '%'
        );
    }

  }
}