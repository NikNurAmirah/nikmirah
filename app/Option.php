<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    protected $table = 'option';
    protected $fillable = [
        'id',
        'title',
        'description',
        'question_id',
    ];

    public function question()
    {
        return $this->belongsTo('App\Question', 'question_id');
    }
}
