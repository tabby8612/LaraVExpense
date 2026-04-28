<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SubCategory extends Model {
    
    protected $fillable = [
        'createdBy',
        'categoryID',
        'name',
        'description'
    ];

    public function category(): BelongsTo {
        return $this->belongsTo(Category::class, 'categoryID');
    }

    public function user(): BelongsTo {
        return $this->belongsTo(User::class,'createdBy');
    }
}
