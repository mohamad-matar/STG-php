<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    /** @use HasFactory<\Database\Factories\PlaceFactory> */
    use HasFactory;
    protected $fillable = [
        'name_ar',
        'name_en',
        'description_ar',
        'description_en',
        'image_id',
        'province_id'
    ];

    function placeShows(){
        return $this->hasMany(PlaceShow::class);
    }

    function province(){
        return $this->belongsTo(Province::class);
    }
}
