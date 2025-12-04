<?php

namespace Database\Factories;

use App\Models\Application;
use Illuminate\Database\Eloquent\Factories\Factory;

class InterviewFactory extends Factory
{
    public function definition(): array
    {
        return [
            'application_id' => Application::factory(),
            'status' => $this->faker->randomElement(['pending', 'approved', 'disapproved']),
            'approved_at' => null,
        ];
    }

    public function pending()
    {
        return $this->state(['status' => 'pending']);
    }

    public function approved()
    {
        return $this->state([
            'status' => 'approved',
            'approved_at' => now(),
        ]);
    }
}
