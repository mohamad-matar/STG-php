<?php

namespace App\Models\Provider;

use Illuminate\Database\Eloquent\Model;


class Api extends Model
{
    protected $fillable = [
        'services_url',
        'request_url',
        'view_url',
        'provider_id' ,
    ];
    function apiRequests()
    {
        return $this->hasMany(ApiRequest::class);
    }
}
 