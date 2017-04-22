<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'question';

    protected $fillable = [
        'title',
        'pre_question_id',
        'survey_id',
        'option_id',
        'type_id',
        'require',
    ];

    public function survey()
    {
        return $this->belongsTo('App\Survey', 'survey_id');
    }
    public function sub_questions()
    {
        return $this->hasMany('App\Question', 'pre_question_id');
    }

    public function pre_question()
    {
        return $this->belongsTo('App\Question', 'id');
    }

    public function option()
    {
        return $this->hasMany('App\Option');
    }

    public function type()
    {
        return $this->hasOne('App\Type');
    }

    public function answer()
    {
        return $this->hasMany('App\Answer');
    }

}

