<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Status;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $stages = [
            'Pending',
            'Accepted',
            'Interview',
            'Technical Review',
            'On Track',
            'Offer Sent',
            'Accepted Offer',
            'Hired',
            'Rejected',
        ];

        foreach ($stages as $stage) {
            $status = ['status' => $stage];
            Status::create($status);
        }
    }
}
