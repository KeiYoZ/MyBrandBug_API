<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BugLife extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'message', 'user_id',
    ];

    public function user(){
    	return $this->belongsTo('User');
    }
}
