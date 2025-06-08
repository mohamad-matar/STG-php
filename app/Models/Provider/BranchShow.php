<?php

namespace App\Models\Provider;

use Illuminate\Database\Eloquent\Model;

class BranchShow extends Model
{
    protected $fillable = [
        'name_ar',
        'name_en',
        
        'provider_branch_id',
        'image_id',        
    ];
}
