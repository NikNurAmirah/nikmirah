<?php

use Illuminate\Database\Seeder;

class QuestionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    //Create a new question
    public function run()
    {
        DB::table('question')->insert([
            ['id' => 1, 'creator_id' => "51", 'title' => "How are you feeling today?", 'survey_id' => "1", 'question_type' => 'multi', 'require' => "1"],
            ['id' => 2, 'creator_id' => "51", 'title' => "What mood are you in?", 'survey_id' => "1", 'question_type' => 'check', 'require' => "1"],
            ['id' => 3, 'creator_id' => "51", 'title' => "What are you doing today?", 'survey_id' => "1", 'question_type' => 'text', 'require' => "1"],
        ]);
    }
}
