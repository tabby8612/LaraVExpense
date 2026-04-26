<?php

namespace App\Dtos\Account;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class AccountDTO extends Data
{
    public function __construct(
        public ?string $name,
        public ?string $accountNo,
        public ?int $openingBalance,
        public ?string $description,
    ) {}
}
