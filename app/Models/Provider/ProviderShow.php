<?php

namespace App\Models\Provider;

use Illuminate\Database\Eloquent\Model;

class ProviderShow extends Model
{
    protected $fillable = [
        'name_ar',
        'name_en',
        
        'provider_id',
        'image_id',        
    ];
}
