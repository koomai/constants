<?php

namespace Koomai\Constants\Tests;

use Koomai\Constants\InvalidConstantException;
use PHPUnit\Framework\TestCase;

class ConstantsUnitTest extends TestCase
{
    /**
     * @test
     */
    public function should_return_constant_values_correctly()
    {
        $this->assertEquals('Alpha', Stub::get('Alpha'));
        $this->assertEquals('Bravo', Stub::get('Bravo'));
        $this->assertEquals('Charlie', Stub::get('Charlie'));
    }

    /**
     * @test
     */
    public function should_throw_exception_if_value_does_not_exist()
    {
        $value = 'Delta';

        $this->expectException(InvalidConstantException::class);
        $this->expectExceptionMessage("{$value} is not a valid value");

        Stub::get($value);
    }
}
