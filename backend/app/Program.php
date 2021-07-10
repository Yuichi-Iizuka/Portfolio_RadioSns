<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $table = 'programs';

    protected $fillable = [
        'title',
        'body',
        'tag',
        'start_date',
        'start_time',
        'user_id',
        'image_path',
    ];

    // protected $dates = [
    //     'start_date',
    // ];

    

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
