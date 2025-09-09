<?php

namespace App\Enums;

enum UserRole: string
{
    use Enum;

    case ADMIN = 'admin';
    case BUYER = 'buyer';
    case DRIVER = 'driver';
    case BACK_OFFICE = 'back_office';
    case BUYER_DRIVER = 'buyer_driver';
}
