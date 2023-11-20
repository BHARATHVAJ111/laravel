<?php

namespace App\Model;

use App\Likable;
use Illuminate\Database\Eloquent\Model;
use App\User;

class Tweet extends Model
{
    use Likable;

    protected $table='tweety_tweets';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
