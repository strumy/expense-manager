<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3),
            'type' => $this->faker->randomElement(['expense', 'income']),
            'amount' => $this->faker->randomFloat(2, 1, 1000),
            'date_of_transaction' => $this->faker->date(),
            'status' => $this->faker->randomElement(['enabled', 'disabled']),
            'user_id' => User::factory(),
        ];
    }
}
