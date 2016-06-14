<?php

namespace Tests\Unit\Model;

use Mbright\Model\FizzBuzz;

/**
 * @group Unit
 */
class FizzBuzzUnitTest extends \PHPUnit_Framework_TestCase
{
    public  function getData()
    {
        return [
            'test one' => [1, 1, 'handleInteger'],
            'test two' => [2, 2, 'handleInteger'],
            'test three' => [3, 'Fizz', 'handleFizz'],
            'test four' => [4, 4, 'handleInteger'],
            'test five' => [5, 'Buzz', 'handleBuzz'],
            'test six' => [6, 'Fizz', 'handleFizz'],
            'test seven' => [7, 7, 'handleInteger'],
            'test eight' => [8, 8, 'handleInteger'],
            'test nine' => [9, 'Fizz', 'handleFizz'],
            'test ten' => [10, 'Buzz', 'handleBuzz'],
            'test eleven' => [11, 11, 'handleInteger'],
            'test twelve' => [12, 'Fizz', 'handleFizz'],
            'test thirteen' => [13, 13, 'handleInteger'],
            'test fourteen' => [14, 14, 'handleInteger'],
            'test fifteen' => [15, 'FizzBuzz', 'handleFizzBuzz']
        ];
    }

    /**
     * @dataProvider getData()
     */
    public function testWithData($int, $expected, $method)
    {
        // Create a test double for the printer
        $printer = \Mockery::mock('\Mbright\Model\Printer');
        $printer->shouldReceive('setFormat')->with('string')->once();
        $printer->shouldReceive($method)->andReturn($expected);

        $fizzBuzz = new FizzBuzz($printer);
        $this->assertEquals($expected, $fizzBuzz->handleInteger($int));
    }
}
