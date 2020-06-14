<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    public function video()
    {
        return $this->hasMany('App\Video');
    }

    public function genre()
    {
        return $this->belongsToMany('App\Genre');
    }

}
