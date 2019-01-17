<?php
/**
 * Created by PhpStorm.
 * User: digital
 * Date: 17/01/2019
 * Time: 13:40
 */

namespace App\Enum;

TypeGoodEnum::$typeName[$variable];

abstract class TypeGoodEnum
{
    const __default = self::FULL_HOUSING;

    const FULL_HOUSING = 0;
    const PRIVATE_ROOM = 1;
    const SHARED_ROOM = 2;

    public static $typeName = [
        self::FULL_HOUSING => "Full housing",
        self::PRIVATE_ROOM => "Private room",
        self::SHARED_ROOM => "Shared room",
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
            self::FULL_HOUSING,
            self::PRIVATE_ROOM,
            self::SHARED_ROOM,
        ];
    }
}