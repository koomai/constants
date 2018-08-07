<?php

namespace Koomai\Constants;

use ReflectionClass;

abstract class Constants
{
    /** @var array */
    protected static $cache = [];

    /**
     * @param mixed $value
     *
     * @return mixed
     * @throws \Koomai\Constants\InvalidConstantException
     */
    public static function get($value)
    {
        $constant = array_search($value, static::all(), true);

        if (!$constant) {
            throw new InvalidConstantException("{$value} is not a valid value in " . get_called_class());
        }

        return $value;
    }

    /**
     * Caches and returns an associative array of constants
     * in the current class
     *
     * @return array
     * @throws \ReflectionException
     */
    public static function all(): array
    {
        $className = get_called_class();

        if (!array_key_exists($className, static::$cache)) {
            static::$cache[$className] = (new ReflectionClass($className))->getConstants();
        }

        return static::$cache[$className];
    }

    /**
     * Determines if the value exists
     *
     * @param $value
     *
     * @return bool
     */
    public static function has($value): bool
    {
        return in_array($value, static::all(), true);
    }
}
