<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudySessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('study_sessions')->insert([
            ['title' => '2016-2017', ],
            ['title' => '2017-2018', ],
            ['title' => '2018-2019', ],
            ['title' => '2019-2020', ],
            ['title' => '2020-2021', ],
            ['title' => '2021-2022', ],

        ]);
    }
}
