<?php

namespace Tests\Unit\Model;

use Mbright\Model\FizzBuzz;

class FizzBuzzTest extends \PHPUnit_Framework_TestCase
{
    public  function getData()
    {
        return [
            'test one' => [1, 1],
            'test two' => [2, 2],
            'test three' => [3, 'Fizz'],
            'test four' => [4, 4],
            'test five' => [5, 'Buzz'],
            'test six' => [6, 'Fizz'],
            'test seven' => [7, 7],
            'test eight' => [8, 8],
            'test nine' => [9, 'Fizz'],
            'test ten' => [10, 'Buzz'],
            'test eleven' => [11, 11],
            'test twelve' => [12, 'Fizz'],
            'test thirteen' => [13, 13],
            'test fourteen' => [14, 14],
            'test fifteen' => [15, 'FizzBuzz']
        ];
    }

    /**
     * @dataProvider getData()
     */
    public function testWithData($int, $expected)
    {
        // Create a test double for the printer
        $printer = \Mockery::mock('\Mbright\Model\Printer');
        $printer->shouldReceive('setFormat')->with('string');
        if ($expected === 'Fizz') {
            $printer->shouldReceive('handleFizz')->andReturn('Fizz');
        } elseif ($expected === 'Buzz') {
            $printer->shouldReceive('handleBuzz')->andReturn('Buzz');
        } elseif ($expected === 'FizzBuzz') {
            $printer->shouldReceive('handleFizzBuzz')->andReturn('FizzBuzz');
        } else {
            $printer->shouldReceive('handleInteger')->andReturn($expected);
        }

        $fizzBuzz = new FizzBuzz($printer);
        $this->assertEquals($expected, $fizzBuzz->handleInteger($int));
    }
}
