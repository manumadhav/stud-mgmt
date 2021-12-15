<?php

use Illuminate\Database\Seeder;
use App\Teachers;

class TeacherSeeder extends Seeder
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
                'name' => 'Sam',
                'gender' => 'M',
                'subject_id' => '1',
            ],
            [
                'name' => 'John',
                'gender' => 'M',
                'subject_id' => '2',
            ],
            [
                'name' => 'Mary',
                'gender' => 'F',
                'subject_id' => '3',
            ],
            [
                'name' => 'Diana',
                'gender' => 'F',
                'subject_id' => '3',
            ]
        ];

        foreach ($data as $teacher) {
            Teachers::create([
                'name' => $teacher['name'],
                'gender' => $teacher['gender'],
                'subject_id' => $teacher['subject_id'],
            ]);
        }
    }
}
