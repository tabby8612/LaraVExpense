<?php

namespace App\Models;

use App\Enums\TransactionTypeEnum;
use App\Observers\Transaction\TransactionObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Attributes\UsePolicy;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[ObservedBy(TransactionObserver::class)]
class Transaction extends Model
{
    //
    protected $fillable = [
        'type', 'userID', 'name', 'slug', 'referenceNo', 'amount',
        'accountID', 'categoryID', 'subCategoryID', 'note', 'date'
    ];

    public function type(): Attribute {
        return Attribute::get(fn ($val) => TransactionTypeEnum::from($val)->label());
    }

    public function user(): BelongsTo {
        return $this->belongsTo(User::class, 'userID');
    }

    public function account(): BelongsTo {
        return $this->belongsTo(Account::class, 'accountID');
    }

    public function category(): BelongsTo {
        return $this->belongsTo(Category::class, 'categoryID');
    }

    public function subCategory(): BelongsTo {
        return $this->belongsTo(SubCategory::class, 'subCategoryID');
    }

}
