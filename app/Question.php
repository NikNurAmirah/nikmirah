<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'question';

    protected $fillable = [
        'id',
        'title',
        'creator_id',
        'pre_question_id',
        'survey_id',
        'option_id',
        'question_type',
        'require',
    ];

    public function survey()
    {
        return $this->belongsTo('App\Survey', 'survey_id');
    }
    public function user()
    {
        return $this->belongsTo('App\User', 'creator_id');
    }
    public function sub_questions()
    {
        return $this->hasMany('App\Question', 'pre_question_id');
    }

    public function pre_question()
    {
        return $this->belongsTo('App\Question', 'id');
    }

    public function options()
    {
        return $this->hasMany('App\Option');
    }

    public function type()
    {
        return $this->hasOne('App\Type', 'question_type');
    }

    public function answers()
    {
        return $this->hasMany('App\Answer');
    }

}

