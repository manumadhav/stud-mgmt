<?php

use Illuminate\Database\Seeder;
use App\Terms;

class TermSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $terms = [
            [
                'name' => 'One',
                'description' => 'First Term Exam',
            ],
            [
                'name' => 'Two',
                'description' => 'Second Term Exam',
            ],
            [
                'name' => 'Three',
                'description' => 'Third Term Exam',
            ]
        ];

        foreach ($terms as $term) {
            Terms::create([
                'name' => $term['name'],
                'description' => $term['description'],
            ]);
        }
    }
}
