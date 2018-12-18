<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hobby extends Model
{
    public function contacts()
    {
        return $this->belongsToMany('App\Contact')->withTimestamps();
    }

    public static function getForCheckboxes()
    {
        $hobbies = self::orderBy('hobby_name')->get();
        $hobbiesForCheckboxes = [];
        foreach ($hobbies as $hobby) {
            $hobbiesForCheckboxes[$hobby['id']] = $hobby->hobby_name;
        }
        return $hobbiesForCheckboxes;
    }
}
