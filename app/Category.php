<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property array|null|string name
 */
class Category extends Model
{
    public function products(){
        return $this->hasMany('App\Product');
    }
}
