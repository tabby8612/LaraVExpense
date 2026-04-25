<?php

namespace App\Observers\Account;

use App\Models\Account;
use Pest\Support\Str;

class AccountObserver
{
    /**
     * Handle the User "created" event.
     */
    public function created(Account $account): void
    {
        $account->slug = Str::slugify($account->name . '-' . $account->id);
        $account->save();
    }
}
