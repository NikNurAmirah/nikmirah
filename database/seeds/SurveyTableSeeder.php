<?php

use Illuminate\Database\Seeder;

class SurveyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('survey')->insert([
            ['id' => 1, 'creator_id' => "51", 'slug' => "1", 'title' => "Survey 1 Test", 'description' => "This is the 1st test", 'active' => "0", 'anonymous' => "0"],
        ]);
    }
}
