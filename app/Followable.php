<?php

namespace App;

trait Followable
{

    public function follow(User $user)
    {
        return $this->follows()->save($user);
    }


    public function unfollow(User $user)
    {
        return $this->follows()->detach($user);
    }

    public function toggleFollow(User $user)
    {
        // if ($this->following($user)) {

        //     //have the auth user follow the given user
        //     return $this->unfollow($user);
        // }
        // //have the auth user follow the given user
        // return $this->follow($user);

        $this->follows()->toggle($user);
    }


    public function following(User $user)
    {
        return $this->follows()->where('following_user_id', $user->id)->exists();
    }


    public function follows()
    {
        return $this->belongsToMany(User::class, 'tweety_follows', 'user_id', 'following_user_id');
    }


    public function request()
    {
        return $this->belongsToMany(User::class, 'tweety_follows', 'following_user_id')->where('request',0);
    }

    public function followers()
    {
        return $this->belongsToMany(User::class, 'tweety_follows', 'user_id', 'following_user_id')->where('request',1);
    }


}
