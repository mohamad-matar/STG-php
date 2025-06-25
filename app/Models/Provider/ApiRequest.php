<?php

namespace App\Models\Provider;

use Illuminate\Database\Eloquent\Model;


class ApiRequest extends Model
{    
    protected $fillable = [
        'service_id',
        'quantity' ,
        'api_id',
    ];
}
 