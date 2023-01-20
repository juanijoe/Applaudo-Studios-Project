<?php

namespace Database\Factories;

use App\Models\Status;
use App\Models\Position;
use App\Models\Candidate;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Postulation>
 */
class PostulationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $candidate_id = fake()->randomElement(Candidate::all()->pluck('id')->all());
        $status_id = fake()->randomElement(Status::all()->pluck('id')->all());
        $position_id = fake()->randomElement(Position::all()->pluck('id')->all());
        return [
            'candidate_id' => $candidate_id,
            'status_id' => $status_id,
            'position_id' => $position_id
        ];
    }
}
