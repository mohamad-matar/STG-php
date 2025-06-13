<?php

namespace App\Models\Provider;

use Illuminate\Database\Eloquent\Model;


class ApiRequestParam extends Model
{
    protected $fillable = [
        'key' ,
        'api_request_id' ,
    ];
}
 