<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    protected $table = 'survey';

    protected $fillable = [
        'id',
        'creator_id',
        'slug',
        'title',
        'description',
        'active',
        'anonymous',
    ];

    public function question()
    {
        return $this->hasMany('App\Question');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'creator_id');
    }


}
