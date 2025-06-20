<?php

namespace App\Models\Provider;

use App\Models\Admin\Service;
use App\Models\Contact;
use App\Models\Place;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Provider extends Model
{
    protected $fillable = [
        'name_ar',
        'name_en',
        'description_ar',
        'description_en',
        'license_number',
        'place_id',
        'image_id' ,
    ];

    function api(){
        return $this->hasOne(Api::class);
    }
    function place(){
        return $this->belongsTo(Place::class);
    }    
    function providerShows(){
        return $this->hasMany(providerShow::class);
    }    
    function branches(){
        return $this->hasMany(Branch::class);
    }

    function services(){
        return $this->belongsToMany(Service::class);
    }

    function trips()
    {
        return $this->hasMany(Trip::class);
    }
    
    /**
     * Get all of the provider's contacts.
     */
    public function contacts(): MorphMany
    {
        return $this->morphMany(Contact::class, 'owner');
    }
}
 