<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SummaryTopics>
 */
class SummaryTopicsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'summary_id' => mt_rand(1, 5),
            'title' => fake()->sentence(mt_rand(1, 4)),
            'content' => fake()->text(),
        ];
    }
}
