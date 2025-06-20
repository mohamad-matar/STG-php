<?php

namespace App\Models\Provider;

use App\Models\Tourist;
use Illuminate\Database\Eloquent\Model;


class Trip extends Model
{        
    protected $fillable = [
        'title_ar',
        'title_en' ,

        'start_date' ,
        'end_date' ,
        
        'count',
        'cost',
        'note' ,  
        
        'provider_id'      
    ];        
        
    function tripDetails(){
        return $this->hasMany(TripDetail::class);
    }

    function provider(){
        return $this->belongsTo(provider::class);
    }    

    function tourists(){
        return $this->belongsToMany(Tourist::class);
    }
}
 