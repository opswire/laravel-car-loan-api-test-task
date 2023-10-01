<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Application;
use App\Models\Bank;
use App\Models\Dealer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Application>
 */
class ApplicationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'dealer_id'     => Dealer::factory(),
            'amount'        => fake()->randomFloat(2, 1000, 10000),
            'term'          => fake()->numberBetween(1, 100),
            'interest_rate' => fake()->randomFloat(2, 1, 50),
            'reason'        => fake()->sentence,
            'status'        => fake()->word,
            'bank_id'       => Bank::factory(),
        ];
    }
}
