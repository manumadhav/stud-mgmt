<?php

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
        $this->call(TermSeeder::class);
        $this->call(SubjectSeeder::class);
        $this->call(TeacherSeeder::class);
    }
}
