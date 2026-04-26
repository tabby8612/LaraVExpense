<?php

namespace App\Dtos\Category;

use Spatie\LaravelData\Data;

class CategoryDTO extends Data
{
    public function __construct(
        //
        public int $createdBy,
        public ?int $transactionType,
        public ?string $name,
        public ?string $description,
        public ?string $color,
    ) {}
}
