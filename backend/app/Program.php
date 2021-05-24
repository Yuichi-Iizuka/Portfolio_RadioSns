<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $table = 'programs';

    protected $fillable = [
        'title',
        'body',
        'tags',
        'image',
    ];

    public function users()
    {
        return $this->belongsToMany('App\User')
        ->withTimestamps();
    }

    public function likes()
    {
        return $this->belongsToMany('App\User','likes')
        ->withTimestamps();
        
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

}
