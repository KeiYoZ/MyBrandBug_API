<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'media',
        'caption',
        'location',
    ];

    public function user(){
    	return $this->belongsTo('User')
                    ->select(['id', 'fname', 'lname']);
    }

    public function hashtags(){
    	return $this->belongsToMany('Hashtag', 'posts_hashtags', 'post_id', 'hashtag_id');
    }
}
