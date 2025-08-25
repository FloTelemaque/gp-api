<?php

namespace App\Enums;

trait Enum
{
    /**
     * Convert the enum cases to an array
     *
     * @return array
     */
    public static function toArray(): array
    {
        return array_combine(
            array_column(self::cases(), 'value'),
            array_column(self::cases(), 'name')
        );
    }

    /**
     * Get all available roles as an array of enum values
     *
     * @return array
     */
    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
