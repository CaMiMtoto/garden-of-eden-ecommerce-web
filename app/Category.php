<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

/**
 * @property array|null|string name
 */
class Category extends Model
{
    public function products()
    {
        return $this->hasMany('App\Product');
    }

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope('active', function (Builder $builder) {
            $builder->where('status', '=', 'Active');
        });
    }
}
