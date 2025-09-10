<?php

namespace App\Enums;

enum CompanyStatus: string
{
    use Enum;

    case CREATED = 'created';
    case ACTIVE = 'active';
    case INACTIVE = 'inactive';
    case SUSPENDED = 'suspended';
}
