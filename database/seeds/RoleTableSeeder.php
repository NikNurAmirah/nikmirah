<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            ['id' => 1, 'name' => "Admin", 'label' => "Admin"],
            ['id' => 2, 'name' => "Creator", 'label' => "Creator"],
          ]);
      }
}
