<?php

namespace App\Models;

use App\Enums\TransactionTypeEnum;
use App\Policies\Category\CategoryPolicy;
use Illuminate\Database\Eloquent\Attributes\UsePolicy;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[UsePolicy(CategoryPolicy::class)]
class Category extends Model {
    //

    protected $fillable = [
        'createdBy',
        'transactionType',
        'name',
        'description',
        'color',
    ];

    public function transactionType(): Attribute {
        return Attribute::get(fn ($value) => TransactionTypeEnum::from($value)->label());
    }

    public function user(): BelongsTo {
        return $this->belongsTo(User::class, 'createdBy');
    }

    public function subCategories(): HasMany {
        return $this->hasMany(SubCategory::class, 'categoryID');
    }


}
