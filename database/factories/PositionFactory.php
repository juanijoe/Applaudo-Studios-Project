<?php

namespace Database\Factories;


use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Recruiter;
use App\Models\Company;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Position>
 */
class PositionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $company_id = fake()->randomElement(Company::all()->pluck('id')->all());
        $recruiter_id = fake()->randomElement(Recruiter::all()->pluck('id')->all());
        $salary = rand(1200, 3800);
        $description = fake()->jobTitle;
        $position_status = fake()->boolean;
        return [
            'company_id' => $company_id,
            'recruiter_id' => $recruiter_id,
            'salary' => $salary,
            'description' => $description,
            'position_status' => $position_status
        ];
    }
}
