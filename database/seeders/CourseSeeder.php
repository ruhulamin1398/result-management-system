<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        
        DB::table('courses')->insert([

            [
                'course_code' => 'EEE 101',
                'title' => 'lorem ipsum',
                'type' => '1',
                'credit' => '3.00',
                'semester_id' => '1',
                'department_id' => '2',
            ],
            [
                'course_code' => 'EEE 102',
                'title' => 'lorem ipsum (Sessional) ',
                'type' => '2',
                'credit' => '1.500',
                'semester_id' => '1',
                'department_id' => '2',
            ],[
                'course_code' => 'EEE 201',
                'title' => 'lorem ipsum',
                'type' => '1',
                'credit' => '3.00',
                'semester_id' => '2',
                'department_id' => '2',
            ],
            [
                'course_code' => 'EEE 202',
                'title' => 'lorem ipsum (Sessional) ',
                'type' => '2',
                'credit' => '1.500',
                'semester_id' => '2',
                'department_id' => '2',
            ],




        ]);


    }
}
