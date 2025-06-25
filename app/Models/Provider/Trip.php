<?php

namespace App\Models\Provider;

use App\Models\Comment;
use App\Models\Tourist;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Trip extends Model
{        
    protected $fillable = [
        'name_ar',
        'name_en' ,

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
        return $this->belongsToMany(Tourist::class)->withPivot(['seat_count'])->withTimestamps();
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commented');
    }
}
 