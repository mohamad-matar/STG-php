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
        'type' ,
        'value' ,
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
<<<<<<< HEAD
=======
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
>>>>>>> ba61e373a6f28c91ffad29a7e3edcd5f493b2a8e
}
 