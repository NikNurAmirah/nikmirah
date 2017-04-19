<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //disable foreign key check for this connection before running seeders
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Model::unguard();


        User::truncate();

        //re-enable foreign key check for this connection
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');


        factory(User::class, 50)->create();

        Model::reguard();
    }
}
