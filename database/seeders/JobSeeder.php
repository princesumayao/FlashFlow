<?php

namespace Database\Seeders;

use App\Models\Applicant;
use App\Models\Credential;
use App\Models\Interview;
use App\Models\Job;
use App\Models\User;
use Illuminate\Database\Seeder;

class JobSeeder extends Seeder
{
    public function run(): void
    {
        // Create jobs with employers
        Job::factory()->count(20)->create();

        // Create applicants with profiles
        User::factory()
            ->count(5)
            ->state(['user_type' => 'applicant'])
            ->create()
            ->each(function ($user) {
                // Create applicant profile
                Applicant::factory()->create(['user_id' => $user->id]);

                // Create 2-4 credentials for each applicant
                Credential::factory()
                    ->count(rand(2, 4))
                    ->create(['user_id' => $user->id]);
            });

        // Create interviews
        Interview::factory()->count(20)->create();
    }
}
