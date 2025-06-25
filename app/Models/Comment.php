<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['comment','type', 'commented_id' ,'commented_type', 'tourist_id'  ];

    /**
     * Get the parent owner model (tourest or provider or branch).
     */
    public function commented()
    {
        return $this->morphTo();
    }
    public function tourist()
    {
        return $this->belongsTo(Tourist::class);
    }

}
