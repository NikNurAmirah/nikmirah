<?php

use Illuminate\Database\Seeder;

class PermissionRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permission_role')->insert([
            ['permission_id' => 20, 'role_id' => "1"],
            ['permission_id' => 21, 'role_id' => "1"],
            ['permission_id' => 22, 'role_id' => "1"],
        ]);
    }
}
