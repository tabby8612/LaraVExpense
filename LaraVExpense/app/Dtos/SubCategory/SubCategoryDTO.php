<?php

namespace App\Dtos\SubCategory;

use Spatie\LaravelData\Data;

class SubCategoryDTO extends Data
{
    public function __construct(
        public ?int $createdBy,
        public ?int $categoryID,
        public ?string $name,
        public ?string $description,
    ) {}
}
