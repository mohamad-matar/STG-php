<?php

namespace App\Models\Provider;

use App\Models\Contact;
use App\Models\Image;
use App\Models\Place;
use App\Models\Province;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Provider extends Model
{
    protected $fillable = [
        'type' ,
        'value' ,
    ];
    function place(){
        return $this->belongsTo(Place::class);
    }    
    function providerShows(){
        return $this->hasMany(providerShow::class);
    }    
    function branches(){
        return $this->hasMany(Branch::class);
    }

    /**
     * Get all of the provider's contacts.
     */
    public function contacts(): MorphMany
    {
        return $this->morphMany(Contact::class, 'owner');
    }
}
 