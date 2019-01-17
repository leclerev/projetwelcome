<?php
/**
 * Created by PhpStorm.
 * User: digital
 * Date: 17/01/2019
 * Time: 13:10
 */

namespace App\Enum;


abstract class TypePropertyEnum
{
    const __default = self::HOUSE;

    const HOUSE = 0;
    const SUITE = 1;

    protected static $typeName = [
        self::HOUSE => 'House',
        self::SUITE => 'Apartment',
    ];

    public static function getTypeName($typeShortName)
    {
        if (!isset(static::$typeName[$typeShortName])) {
            return "Unknown type ($typeShortName)";
        }

        return static::$typeName[$typeShortName];
    }

    public static function getAvailableTypes()
    {
        return [
            self::HOUSE,
            self::SUITE,
        ];
    }
}