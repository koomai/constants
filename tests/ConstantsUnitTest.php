<?php

namespace Koomai\Constants\Tests;

use Koomai\Constants\InvalidConstantException;
use PHPUnit\Framework\TestCase;

class ConstantsUnitTest extends TestCase
{
    
    /**
     * @test
     */
    public function should_return_all_constants_as_an_array()
    {
        $constants = [
            'A' => 'Alpha',
            'B' => 'Bravo',
            'C' => 'Charlie',
        ];
        
        $this->assertEquals($constants, Stub::all());
    }
    
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
        $this->expectExceptionMessage("{$value} is not a valid value for Koomai\\Constants\\Tests\\Stub");

        Stub::get($value);
    }

    /**
     * @test
     */
    public function should_determine_if_value_exists()
    {
        $this->assertTrue(Stub::has('Alpha'));
        $this->assertFalse(Stub::has('Delta'));
    }
}
