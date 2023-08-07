<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Harga>
 */
class HargaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => $this->faker->name,
            'harga' => $this->faker->randomFloat(2, 1000, 100000),
            'fitur' => json_encode([
                'Hosting Gratis',
                'Maintenance',
                'Garansi 4 bulan'
            ]),
            'category_id' => 1
        ];
    }
}
