<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlaceShow extends Model
{
    protected $fillable = [
        'name_ar',
        'name_en',
        'place_id',
        'image_id'
    ];

    function image()
    {
        return $this->belongsTo(Image::class);
    }
}
