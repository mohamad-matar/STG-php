<?php

namespace App\Models\Provider;

use Illuminate\Database\Eloquent\Model;


class Api extends Model
{
    protected $fillable = [
        'url' ,
        'provider_id' ,
    ];
    function apiRequests()
    {
        return $this->hasMany(ApiRequest::class);
    }
}
 