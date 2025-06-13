<?php

namespace App\Models\Provider;

use App\Models\Contact;
use App\Models\Place;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

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

    public function contacts(): MorphMany
    {
        return $this->morphMany(Contact::class, 'owner');
    }
}
 