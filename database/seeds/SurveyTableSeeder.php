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
            ['id' => 1, 'creator_id' => "51", 'slug' => "1", 'title' => "Feeling Survey", 'description' => "This is to see how the user is feeling", 'active' => "1", 'anonymous' => "1"],
        ]);
    }
}
