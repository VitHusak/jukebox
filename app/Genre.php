<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    public function video()
    {
        return $this->belongsToMany('App\Video');
    }
    public function author()
    {
        return $this->belongsToMany('App\Author');
    }
}
