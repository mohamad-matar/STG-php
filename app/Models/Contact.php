<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Contact extends Model
{
    protected $fillable = [
        'type',
        'value',        
    ];
    /**
     * Get the parent owner model (tourest or provider or branch).
     */
    public function owner(): MorphTo
    {
        return $this->morphTo();
    }
}
