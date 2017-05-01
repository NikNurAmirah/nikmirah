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
        $this->call(RoleTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Model::unguard();


        User::truncate();

        //re-enable foreign key check for this connection
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');


        factory(User::class, 50)->create();

        Model::reguard();

        //Run all seeders
        $this->call(UserTableSeeder::class);
        $this->call(RoleUserTableSeeder::class);
        $this->call(PermissionRoleTableSeeder::class);
        $this->call(SurveyTableSeeder::class);
        $this->call(QuestionTableSeeder::class);
        $this->call(OptionTableSeeder::class);
        $this->call(AnswerTableSeeder::class);

    }
}
