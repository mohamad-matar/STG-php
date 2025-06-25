<?php

namespace App\Models\Admin;

use App\Models\Provider\Provider;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    /** @use HasFactory<\Database\Factories\ServiceFactory> */
    use HasFactory;
    protected $fillable = [
        'name_ar',
        'name_en',        
    ];

    function providers(){
        return $this->belongsToMany(Provider::class);
    }
    
}
