<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hashtags extends Model
{
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'hashtag',
    ];

    public function posts(){
    	return $this->belongsToMany('Post', 'posts_hashtags', 'hashtag_id', 'post_id');
    }
}
