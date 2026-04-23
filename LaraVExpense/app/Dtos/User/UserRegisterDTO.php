<?php

namespace App\Dtos\User;

use Spatie\LaravelData\Data;

class UserRegisterDTO extends Data
{
    public function __construct(
        public string $name,
        public string $email,
        public string $password,
        public int $role,
    ) {}
}
