<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = ['name', 'email', 'password', 'brief'];

    protected $hidden = ['password', 'remember_token'];

    public function musician()
    {
        return $this->hasOne('App\Models\Musician', 'user_id');
    }

    public function statuses()
    {
        return $this->hasMany('App\Models\Status');
    }

    public function followers()//粉丝
    {
        return $this->belongsToMany('App\Models\User', 'followers', 'user_id', 'follower_id');
    }

    public function followings()//关注的人
    {
        return $this->belongsToMany('App\Models\User', 'followers', 'follower_id', 'user_id');
    }

    public function follow($user_ids)//关注
    {
        if(!is_array($user_ids)) {
            $user_ids = compact('user_ids');
        }

        $this->followings()->sync($user_ids, false);
    }

    public function unfollow($user_ids)//取消关注
    {
        if(!is_array($user_ids)) {
            $user_ids = compact('user_ids');
        }

        $this->followings()->detach($user_ids);
    }

    public function isFollowing($user_id)//是否关注
    {
        return $this->followings->contains($user_id);
    }
}
