<?php

namespace App\Enums;

enum SupplierType: string
{
    use Enum;

    case WHOLESALER = 'wholesaler';
    case RETAILER = 'retailer';
    case GREENGROCER = 'greengrocer';

}
