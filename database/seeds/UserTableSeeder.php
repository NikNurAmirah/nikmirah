<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    //Add in an admin user and a Non admin user.
    public function run()
    {
        DB::table('users')->insert([
            ['id' => 51, 'name' => "Admin",
                'email' => 'admin@survey.com',
                'password' => bcrypt('password'),
                'remember_token' => str_random(10),
            ],
            ['id' => 52, 'name' => "Not Admin",
                'email' => 'j@onny.com',
                'password' => bcrypt('password'),
                'remember_token' => str_random(10),
            ],
        ]);
    }

}
