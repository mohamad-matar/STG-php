<?php

namespace App\Models\Provider;

use Illuminate\Database\Eloquent\Model;

class ProviderShow extends Model
{
    protected $fillable = [
        'name_ar',
        'name_en',
        'description_ar',
        'description_en',
       
        'provider_id',
        'image_id',
        'province_id',
        'place_id',
    ];
}
