<?php

use Illuminate\Database\Seeder;
use App\Subjects;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Maths',
                'description' => 'Mathematics',
            ],
            [
                'name' => 'Science',
                'description' => 'General Science',
            ],
            [
                'name' => 'History',
                'description' => 'History',
            ]
        ];

        foreach ($data as $subject) {
            Subjects::create([
                'name' => $subject['name'],
                'description' => $subject['description'],
            ]);
        }
    }
}
