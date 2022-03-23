<?php

namespace App\Constants;

final class States
{
    public const VALID = 'Ok';
    public const INVALID  = 'NOk';


    public static function getList()
    {
        return [
            self::VALID => 'Valid',
            self::INVALID => 'Invalid',
        ];
    }

    public static function getLabel($key)
    {
        return array_key_exists($key, self::getList()) ? self::getList()[$key] : " ";
    }
}
