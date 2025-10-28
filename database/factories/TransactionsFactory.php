<?php

namespace Database\Factories;

use App\Models\Categories;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class TransactionsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(), // otomatis buat user dummy
            'type' => $this->faker->randomElement(['income', 'expense']),
            'category_id' => Categories::inRandomOrder()->first()?->category_id ?? Categories::factory(),
            'amount' => $this->faker->numberBetween(10000, 1000000),
            'date' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'description' => $this->faker->sentence(6),
            'receipt_file' => null,
            //
        ];
    }
}
