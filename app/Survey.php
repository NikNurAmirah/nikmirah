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
        return $this->hasOne('App\Question');
    }

    public function users()
    {
        return $this->belongsToMany('App\User', 'users_surveys');
    }


}
