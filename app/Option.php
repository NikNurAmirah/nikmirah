<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    protected $fillable = [
        'title',
        'description',
    ];

    public function question()
    {
        return $this->belongsTo('App\Question');
    }
}
