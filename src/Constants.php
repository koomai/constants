<?php

namespace Koomai\Constants;

use ReflectionClass;

abstract class Constants
{
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
            throw new InvalidConstantException("{$value} is not a valid value");
        }

        return $value;
    }

    /**
     * Returns an associative array of constants
     * in the current class
     *
     * @return array
     * @throws \ReflectionException
     */
    public static function all(): array
    {
        return (new ReflectionClass(get_called_class()))->getConstants();
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
