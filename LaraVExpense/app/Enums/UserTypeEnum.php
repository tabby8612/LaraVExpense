<?php

namespace App\Enums;

enum UserTypeEnum: int {
    //
    case ADMINISTRATOR = 1;
    case STAFF = 2;

    public function label() {
        return match ($this) {
            self::ADMINISTRATOR => 'Administrator',
            self::STAFF => 'Staff',
        };
    }

    public function toLower() {
        return match ($this) {
            self::ADMINISTRATOR => 'administrator',
            self::STAFF => 'staff',
        };
    }
}
