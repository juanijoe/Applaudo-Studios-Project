<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Postulation;
use App\Models\Company;
use App\Models\Position;
use App\Models\Candidate;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(StatusSeeder::class);
        $this->call(RecruiterSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(RoleSeeder::class);

        Company::factory(5)->create()->each(function ($company) {
            $company_id = Position::factory(5)->create();
            $company->position()->saveMany($company_id);
        });
        Candidate::factory(40)->create()->each(function ($candidate) {
            $candidate_id = Postulation::factory()->create();
            $candidate->postulation()->save($candidate_id);
        });
    }
}
