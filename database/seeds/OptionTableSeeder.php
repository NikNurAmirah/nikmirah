<?php

use Illuminate\Database\Seeder;

class OptionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    //Add in some sample options
        public function run()
    {
        DB::table('option')->insert([
            ['id' => 1, 'title' => "Great", 'question_id' => "1"],
            ['id' => 2, 'title' => "Okay",  'question_id' => "1"],
            ['id' => 3, 'title' => "Bad",  'question_id' => "1"],
            ['id' => 4, 'title' => "Good Mood",  'question_id' => "2"],
            ['id' => 5, 'title' => "Feel Okay", 'question_id' => "2"],
            ['id' => 6, 'title' => "Bad Mood", 'question_id' => "2"],
        ]);
    }

}
