<?php

namespace App\Models;

use App\Observers\Account\AccountObserver;
use App\Policies\Account\AccountPolicy;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Attributes\UsePolicy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

#[ObservedBy(AccountObserver::class)]
#[UsePolicy(AccountPolicy::class)]
class Account extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'userID','slug','name','accountNo','openingBalance','description',
    ];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class, 'userID');
    }
}
