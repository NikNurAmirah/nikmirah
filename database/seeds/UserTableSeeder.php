<?php

use Illuminate\Database\Seeder;

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
            ['id' => 51, 'name' => "Jonny Mars",
                'email' => 'jorfn@hotmail.co.uk',
                'password' => bcrypt('password'),
                'remember_token' => str_random(10),
            ],
        ]);
    }

}
