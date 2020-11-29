<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HomeSlide extends Model
{

    protected $appends = ['image_url'];

    public function getImageUrlAttribute()
    {
        return asset('storage/images/slides' . $this->image);
    }
}
