<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([

            [
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'password' => Hash::make(1234),
            ],
            [
                'name' => 'Student',
                'email' => 'student@admin.com',
                'password' => Hash::make(1234),
            ],
           
             
        ]);



        DB::table('roles')->insert([
            [
                'name' => 'admin',
                'guard_name' => 'web',
            ],  [
                'name' => 'student',
                'guard_name' => 'web',
            ] 
        ]);
 




        DB::table('model_has_roles')->insert([
            [
                'role_id' => 1,
                'model_type' => 'App\Models\User',
                'model_id' => 1,
            ],   [
                'role_id' => 2,
                'model_type' => 'App\Models\User',
                'model_id' => 2,
            ],
        ]);
    }
}
