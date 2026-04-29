<?php

namespace App\Dtos\Transaction;

use Spatie\LaravelData\Data;

class TransactionDTO extends Data
{
    public function __construct(
        public int $type,
        public int $userID,
        public string $name,
        public string $slug,
        public ?string $referenceNo,
        public int $amount,
        public int $accountID,
        public int $categoryID,
        public int $subCategoryID,
        public string $note,
        public string $date,
    ) {}
}

