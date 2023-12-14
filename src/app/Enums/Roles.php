<?php

namespace App\Enums;

enum Roles: string
{
    case SUPERADMIN = 'super_admin';
    case COLLEAGUE = 'colleague';
    case CUSTOMER = 'customer';

    public function label(): string
    {
        return match ($this) {
            static::SUPERADMIN => 'Super Admin',
            static::COLLEAGUE => 'Colleague',
            static::CUSTOMER => 'Customer',
        };
    }
}
