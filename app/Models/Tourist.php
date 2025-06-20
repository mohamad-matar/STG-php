<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tourist extends Model
{
    function county(){
        return $this->belongsTo(Country::class);
    }
}
