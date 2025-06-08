<?php

namespace App\Models\Provider;

use App\Models\Image;
use App\Models\Place;
use App\Models\Province;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{                       
    protected $fillable = [
        'name_ar' ,
        'name_en' ,
        'description_ar' ,
        'description_en' ,

        'provider_id',
        'image_id',
        'place_id',
    ];
    function place(){
        return $this->belongsTo(Place::class);
    }    
        
    function branchShows(){
        return $this->hasMany(BranchShow::class);
    }    
}
 