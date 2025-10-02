<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(),
            'date' => $this->faker->dateTimeBetween('+1 week', '+6 months'),
            'location' => $this->faker->city(),
            'created_by' => User::factory()->create()->id,
        ];
    }
}
