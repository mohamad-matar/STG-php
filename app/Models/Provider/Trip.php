<?php

namespace App\Models\Provider;

use Illuminate\Database\Eloquent\Model;


class Trip extends Model
{        
    protected $fillable = [
        'title' ,
        'start_date' ,
        'end_date' ,
        'note' ,  
        'provider_id'      
    ];        
        
    function tripDetails(){
        return $this->hasMany(TripDetail::class);
    }    
}
 