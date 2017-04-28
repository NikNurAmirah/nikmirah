<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $table = 'answer';
    protected $fillable = [
        'title',
        'atext',
        'question_id',
        'answered_by',
    ];

    public function question()
    {
        return $this->belongsTo('App\Question', 'question_id');
    }
}
