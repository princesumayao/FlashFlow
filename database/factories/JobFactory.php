<?php

namespace Database\Factories;

use App\Models\Employer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'employer_id' => Employer::factory(),
            'title' => fake()->randomElement(['Software Developer', 'Software Engineer', 'Web Developer', 'Frontend Developer', 'Backend Developer']),
            'description' => 'test description for job',
            'location' => fake()->city(),
            'type' => fake()->randomElement(['Full Time', 'Part Time']),
            'work_location' => fake()->randomElement(['Onsite', 'Work From Home']),
            'salary_min' => fake()->numberBetween(30000, 70000),
            'salary_max' => fake()->numberBetween(70001, 150000),
            'featured' => fake()->boolean(50),
            'status' => fake()->randomElement(['active', 'inactive']),
        ];
    }
}
