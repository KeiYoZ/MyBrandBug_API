<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OldPassword extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'old_password', 'user_id',
    ];

    public function user(){
    	return $this->belongsTo('User');
    }
}
