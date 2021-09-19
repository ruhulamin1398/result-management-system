<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departments')->insert([
            [
                'sort_form' => 'CSE',
                'title' => 'Computer Science & Engineering',
            ],

            [
                'sort_form' => 'EEE',
                'title' => '  Department of Electrical and Electronic Engineering',
            ],


            [
                'sort_form' => 'CE',
                'title' => ' Civil Engineering ',
            ],



        ]);
    }
}
