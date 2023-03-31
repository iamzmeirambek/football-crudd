<?php

namespace Database\Seeders;

use App\Models\HandbookStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HandbookStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $handbooks = [
            [
                'name' => 'Active',
            ],
            [
                'name' => 'Work'
            ],
            [
                'name' => 'Refused'
            ]
        ];

        foreach ($handbooks as $handbook) {
            HandbookStatus::query()->firstOrCreate($handbook);
        }
    }
}
