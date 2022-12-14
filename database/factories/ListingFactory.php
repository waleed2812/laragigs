<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Listing>
 */
class ListingFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition()
  {
    $tags = [
      'laravel, api, backend',
      'laravel, api',
      'api, backend',
      'laravel, api, backend, vue'
    ];
    return [
      'title' => fake()->sentence(),
      'tags' => $tags[fake()->numberBetween(0, count($tags) - 1)],
      'company' => $this->faker->company(),
      'email' => $this->faker->companyEmail(),
      'website' => $this->faker->url(),
      'location' => $this->faker->city(),
      'description' => $this->faker->paragraph(5),
    ];
  }
}