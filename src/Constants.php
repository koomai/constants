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
        $constant = array_search($value, static::all());

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
        return (new ReflectionClass(new static))->getConstants();
    }
}
