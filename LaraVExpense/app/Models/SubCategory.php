<?php

namespace App\Models;

use App\Policies\SubCategoryPolicy;
use Illuminate\Database\Eloquent\Attributes\UsePolicy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

#[UsePolicy(SubCategoryPolicy::class)]
class SubCategory extends Model {
    use SoftDeletes;
    
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
