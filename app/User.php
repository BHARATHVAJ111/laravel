<?php

namespace App;

use App\Model\Tweet;
use App\Model\like;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable,Followable;


    // protected $fillable = [
    //     'username','name', 'email', 'password',
    // ];
    protected $guarded=[];


    protected $hidden = [
        'password', 'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function timeline()
    {
        //include all of the users tweets
        //as well as the tweets of everyone
        //they follow...in descenting order by date.

        // return Tweet::where('user_id', $this->id)->latest()->get();

        $friends=$this->follows()->pluck('id');
        // $ids->push($this->id);
        return Tweet::whereIn('user_id',$friends)
        ->orWhere('user_id',$this->id)
        ->withLikes()
        ->latest()
        ->paginate(50);
    }

    public function tweets(){
        return $this->hasMany(Tweet::class)->latest();
    }

    public function getAvatarAttribute($value){
        // return asset("storage/$value");
        return asset($value ?"storage/$value":'images/image_avatar.jfif');
    }


    //user password ="foobar";
    public function setPasswordAttribute($value){
        $this->attributes['password']=bcrypt($value);
    }



    public function getRouteKeyName(){
        // return parent::getRouteKeyName();
        return "username";
    }

    public function path($append ='')
    {
           $path= route('profile',$this->username);

           return $append ? "{$path}/{$append}" : $path;
    }


    public function likes()
    {
        return $this->hasMany(like::class);
    }
}
