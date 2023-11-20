<?php
namespace App;
use App\Model\like;

use Illuminate\Database\Eloquent\Builder;

trait Likable{

    public function scopeWithLikes(Builder $query){
    $query->leftjoinSub(
        'select tweet_id,sum(liked)likes,sum(!liked)dislikes from tweety_likes group by tweet_id',
        'tweety_likes',
        'tweety_likes.tweet_id',
        'tweety_tweets.id'
    );
    }

    public function like($user=null,$liked=true)
    {
        $this->likes()->updateorcreate(
            [
                'user_id' =>$user ? $user->id:auth()->id(),

            ],
            [
                'liked' => $liked,
            ]);
    }

    public function dislike($user=null)
    {
      return $this->like($user,false);
    }

    public function isLikedBy(User $user)
    {
      return(bool)$user->likes()->where('tweet_id',$this->id)->where('liked',true)->count();
    }

    public function isDislikedBy(User $user)
    {
      return(bool)$user->likes()->where('tweet_id',$this->id)->where('liked',false)->count();
    }


    public function likes()
    {
        return $this->hasMany(like::class);
    }
}
