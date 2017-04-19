<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = [
        'title',
        'atext',
        'question_id',
    ];

    public function question()
    {
        return $this->hasOne('App\Question');
    }
}
