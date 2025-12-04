<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CredentialFactory extends Factory
{
    public function definition(): array
    {
        $type = $this->faker->randomElement(['education', 'certification', 'experience']);

        return [
            'user_id' => User::factory()->state(['user_type' => 'applicant']),
            'type' => $type,
            'title' => $this->getTitle($type),
            'institution' => $this->faker->company(),
            'description' => $this->faker->optional()->sentence(),
            'start_date' => $this->faker->dateTimeBetween('-10 years', '-1 year'),
            'end_date' => $this->faker->optional()->dateTimeBetween('-1 year', 'now'),
        ];
    }

    private function getTitle($type): string
    {
        return match($type) {
            'education' => $this->faker->randomElement([
                'Bachelor of Science in Computer Science',
                'Bachelor of Science in Information Technology',
                'Master of Science in Software Engineering',
            ]),
            'certification' => $this->faker->randomElement([
                'Laravel Certified Developer',
                'AWS Certified Developer',
                'PHP Certification',
            ]),
            'experience' => $this->faker->randomElement([
                'Software Developer',
                'Full Stack Developer',
                'Backend Developer',
            ]),
        };
    }
}
