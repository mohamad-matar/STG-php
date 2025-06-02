<?php

namespace App\Models\Provider;

use App\Models\Image;
use App\Models\Place;
use App\Models\Province;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    protected $fillable = [
        'name_ar' ,
        'name_en' ,
        'description_ar' ,
        'description_en' ,
        'license_number' ,
        'image_id',
        'province_id',
        'place_id',
    ];
    function place(){
        return $this->belongsTo(Place::class);
    }
    function province(){
        return $this->belongsTo(Province::class);
    }
    
}
 