<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('results')->insert([

            [
                'student_id' => '1',
                'semester_id' => '1',
                'course_id' => 1,
            ],
            [
                
                'student_id' => '2',
                'semester_id' => '1',
                'course_id' => 1,
            ],
            [
                'student_id' => '1',
                'semester_id' => '1',
                'course_id' => 2,
            ],
            [
                
                'student_id' => '2',
                'semester_id' => '1',
                'course_id' => 2,
            ],
           
             
        ]);
    }
}
