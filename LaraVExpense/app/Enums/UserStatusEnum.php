<?php

namespace App\Enums;

enum UserStatusEnum: int {
    //
    case INACTIVE = 0;
    case ACTIVE = 1;

    public function label() {
        return match ($this) {
            self::INACTIVE => 'Inactive',
            self::ACTIVE => 'Active'
        };
    }

    public function toLower() {
        return match ($this) {
            self::INACTIVE => 'inactive',
            self::ACTIVE => 'active'
        };
    }
}
