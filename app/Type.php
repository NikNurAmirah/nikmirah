<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $fillable = [
        'id',
        'title',
        'description',
    ];

    public function question()
    {
        return $this->belongsToMany('App\Question');
    }
}
