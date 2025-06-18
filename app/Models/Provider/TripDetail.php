<?php

namespace App\Models\Provider;

use App\Models\Place;
use Illuminate\Database\Eloquent\Model;


class TripDetail extends Model
{       
    protected $fillable = [
        'title_ar',
        'title_en',
        'start_date',
        'end_date',
        'note',
        'trip_id',
        'place_id',
    ];

    function place(){
        return $this->belongsTo(Place::class);
    }                
    function trip(){
        return $this->belongsTo(Trip::class);
    }                
}
 