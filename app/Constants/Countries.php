<?php

namespace App\Constants;

final class Countries
{
    public const CAMEROON = '237';
    public const ETHIOPIA  = '251';
    public const MOROCCO = '212';
    public const MOZAMBIQUE = '258';
    public const UGANDA = '256';

    public static function getList()
    {
        return [
            self::CAMEROON => 'Cameroon',
            self::ETHIOPIA => 'Ethiopia',
            self::MOROCCO => 'Morocco',
            self::MOZAMBIQUE => 'Mozambique',
            self::UGANDA => 'Uganda',
        ];
    }

    public static function getListRegex()
    {
        return [
            self::CAMEROON => '/\(237\)\ ?[2368]\d{7,8}$/',
            self::ETHIOPIA => '/\(251\)\ ?[1-59]\d{8}$/',
            self::MOROCCO => '/\(212\)\ ?[5-9]\d{8}$/',
            self::MOZAMBIQUE => '/\(258\)\ ?[28]\d{7,8}$/',
            self::UGANDA => '/\(256\)\ ?\d{9}$/',
        ];
    }

    public static function getLabel($key)
    {
        return array_key_exists($key, self::getList()) ? self::getList()[$key] : " ";
    }

    public static function getRegex($key)
    {
        return array_key_exists($key, self::getListRegex()) ? self::getListRegex()[$key] : " ";
    }
}
