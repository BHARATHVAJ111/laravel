<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class like extends Model
{
    protected $table='tweety_likes';
    // protected $guarded = [];

    protected $fillable=['user_id','tweet_id','liked'];

}
