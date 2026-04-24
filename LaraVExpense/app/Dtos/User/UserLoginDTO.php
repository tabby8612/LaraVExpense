<?php

namespace App\Dtos\User;

use Spatie\LaravelData\Data;

class UserLoginDTO extends Data
{
    public function __construct(
        public string $email,
        public string $password,
    ) {}
}
