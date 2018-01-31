<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function posts(){
        return $this->hasMany('Post');
    }

    public function post_reactions(){
        return $this->hasMany('PostReaction');
    }

    public function old_passwords(){
        return $this->hasMany('OldPassword');
    }

    public function bug_lives(){
        return $this->hasMany('BugLife');
    }

    public function parent_hives(){
        return $this->belongsToMany('User', 'hives', 'user_id', 'friend_id');
    }

    public function children_hives(){
        return $this->belongsToMany('User', 'hives', 'friend_id', 'user_id');
    }

    public function parent_bugs(){
        return $this->belongsToMany('User', 'bugs', 'user_id', 'friend_id');
    }

    public function children_bugs(){
        return $this->belongsToMany('User', 'bugs', 'friend_id', 'user_id');
    }
}
