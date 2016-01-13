<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;


class Cocktail extends Model implements SluggableInterface
{
    use SluggableTrait;

    protected $sluggable = [
        'build_from' => 'name',
        'save_to'    => 'slug',
    ];

    public function ingredients()
    {
        return $this->belongsToMany('App\Ingredient');
    }

    public function glasses()
    {
        return $this->belongsToMany('App\Glass');
    }

    public function syncIngredients(array $ingredients)
    {
        $this->ingredients()->sync([]);

        foreach ($ingredients as $i) {
            $i = trim($i);
            $ingredient = Ingredient::where('name', '=', $i)->first();
            
            if (!$ingredient) {
                $ingredient = new Ingredient(['name' => $i]);
                $this->ingredients()->save($ingredient);
            }

            $this->ingredients()->sync([$ingredient->id], false);
        }
    }
}
