<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tourist extends Model
{
    protected $fillable = [
        'name',
        'country_id',
    ];
    function county(){
        return $this->belongsTo(Country::class);
    }
}
