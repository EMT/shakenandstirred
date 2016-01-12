<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cocktail extends Model
{
    public function ingredients()
    {
        return $this->hasMany('App\Ingredient');
    }

    public function glasses()
    {
        return $this->hasMany('App\Glass');
    }
}
