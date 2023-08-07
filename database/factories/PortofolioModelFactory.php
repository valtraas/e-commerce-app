<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PortofolioModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'judul' => $this->faker->unique()->sentence(),
            'category_id' => $this->faker->numberBetween(1, 3),
            'link' => 'https://laravel.com/docs/10.x'
        ];
    }
}
