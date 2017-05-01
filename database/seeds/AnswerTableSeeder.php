<?php

use Illuminate\Database\Seeder;

class AnswerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Answer')->insert([
            ['id' => 1, 'atext' => "Great", 'question_id' => "1", 'survey_id' => "1"],
            ['id' => 2, 'atext' => "Great Mood, Feel Okay", 'question_id' => "2", 'survey_id' => "1"],
            ['id' => 3, 'atext' => "Not much today, might go out with some friends", 'question_id' => "3", 'survey_id' => "1"],
        ]);
    }
}
