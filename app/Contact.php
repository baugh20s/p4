<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{

    public function hobbies()
    {
        return $this->belongsToMany('App\Hobbie')->withTimestamps();
    }

}
