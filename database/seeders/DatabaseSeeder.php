<?php

namespace Database\Seeders;

use App\Http\Controllers\CourseOfferingController;
use App\Models\student;
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
        // \App\Models\User::factory(10)->create();


        $this->call([
            DepartmentSeeder::class,
            UserTableSeeder::class,
            SemesterSeeder::class,
            CourseSeeder::class,
            StudentSeeder::class,
            StudySessionSeeder::class,
            ResultSeeder::class,
            DepartmentStudySessionSeeder::class,
            CourseOfferingSeeder::class,
        ]);

    }
}
