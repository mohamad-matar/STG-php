<?php

namespace App\Models;

use App\Models\Admin\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    /** @use HasFactory<\Database\Factories\PlaceFactory> */
    use HasFactory;
    protected $fillable = [
        'name_ar',
        'name_en',
        'description_ar',
        'description_en',
        'image_id',
        'province_id',
        'created_by',
    ];

    function placeShows(){
        return $this->hasMany(PlaceShow::class);
    }

    function province(){
        return $this->belongsTo(Province::class);
    }

    function categories(){
        return $this->belongsToMany(Category::class);
    }
    
    function tourists(){
        return $this->belongsToMany(Tourist::class);
    }

    function image()
    {
        return $this->belongsTo(Image::class);
    }
    function user()
    {
        return $this->belongsTo(User::class , 'created_by');
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commented');
    }
}
