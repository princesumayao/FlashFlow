<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ApplicantFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::factory()->state(['user_type' => 'applicant']),
            'instagram_url' => $this->faker->optional()->url(),
            'facebook_url' => $this->faker->optional()->url(),
            'github_url' => $this->faker->optional()->url(),
            'bio' => $this->faker->optional()->paragraph(),
        ];
    }
}
