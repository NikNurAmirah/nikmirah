<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            ['id' => 20, 'name' => "see_adminnav", 'label' => "Can see the admin nav bar"],
            ['id' => 21, 'name' => "update_role", 'label' => "Can update the users role"],
            ['id' => 22, 'name' => "see_all_users", 'label' => "Can see all users"],
        ]);
    }
}
