<?php

namespace Database\Factories;

use App\Models\OperationCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Operation>
 */
class OperationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'label' => fake()->sentence(),
            'value' => rand(-2500, 2000),
            'date' => fake()->date(),
            'operation_categories_id' => OperationCategory::inRandomOrder()->first()->id
        ];
    }
}
