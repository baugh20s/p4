<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hobbie extends Model
{
    public function contacts()
    {
        return $this->belongsToMany('App\Contact')->withTimestamps();
    }
}
