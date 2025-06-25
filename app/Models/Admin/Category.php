<?php

namespace App\Models\Admin;

use App\Models\Place;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /** @use HasFactory<\Database\Factories\ServiceFactory> */
    use HasFactory;
    protected $fillable = [
        'name_ar',
        'name_en',        
    ];

    function places(){
        return $this->belongsToMany(Place::class);
    }
}
    