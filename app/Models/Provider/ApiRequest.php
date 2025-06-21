<?php

namespace App\Models\Provider;

use Illuminate\Database\Eloquent\Model;


class ApiRequest extends Model
{    
    protected $fillable = [
        'title_ar',
        'title_en' ,
        'method' ,
        'path',
        'api_id',
        'params'
    ];
}
 