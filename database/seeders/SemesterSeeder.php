<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SemesterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      
        DB::table('semesters')->insert([
            [
                'title' => '1st Semester',
                
                'level' => 1,
            ],

            [
                'title' => '2nd Semester',
                
                'level' => 2,
            ],
             [
                'title' => '3rd Semester',
                
                'level' => 1,
            ],
             [
                'title' => '4th Semester',
                
                'level' => 2,
            ], [
                'title' => '5th Semester',
                
                'level' => 1,
            ], [
                'title' => '6th Semester',
                
                'level' => 2,
            ], 

            [
                'title' => '7th Semester',
                
                'level' => 1,
            ], 
           

            [
                'title' => '8th Semester',
                
                'level' => 2,
            ], 
           
           


        ]);
    }
}
