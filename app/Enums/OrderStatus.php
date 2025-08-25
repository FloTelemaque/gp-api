<?php

namespace App\Enums;

enum OrderStatus: string
{
    use Enum;

    case PENDING = 'pending';
    case VALIDATED = 'validated';
    case DELIVERED = 'delivered';
    case CANCELED = 'canceled';
}
