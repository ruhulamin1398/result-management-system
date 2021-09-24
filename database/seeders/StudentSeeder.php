<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('students')->insert([

            [
                'name' => 'Sajjad',
                'session_id' => 1,
                'department_id' => 2,
            ],
            [
                'name' => 'Tarek',
                'session_id' => 1,
                'department_id' => 2,
            ],
           
             
        ]);
    }
}
