<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostReaction extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'post_id',
        'is_bitten',
        'is_stinged',
    ];

    public function user(){
    	return $this->belongsTo('User');
    }

    public function post(){
    	return $this->belongsTo('Post');
    }
}
