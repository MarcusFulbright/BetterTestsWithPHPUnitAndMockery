<?php

namespace Tests\Unit\Model;

use Mbright\Model\FizzBuzz;

class FizzBuzzTest extends \PHPUnit_Framework_TestCase
{
    /**
     * We could write tests like these for each and every input.
     */
    public function testThree()
    {
        $fizzBuzz = new FizzBuzz();
        $expected = 'Fizz';
        $this->assertEquals($expected, $fizzBuzz->handleInteger(3));
    }

    public function testFive()
    {
        $fizzBuzz = new FizzBuzz();
        $expected = 'Buzz';
        $this->assertEquals($expected, $fizzBuzz->handleInteger(5));
    }

    /**
     * This is already getting tedious right?
     */
    public function testFifteen()
    {
        $fizzBuzz = new FizzBuzz();
        $expected = 'FizzBuzz';
        $this->assertEquals($expected, $fizzBuzz->handleInteger(15));
    }

    /**
     * There has to be a better way
     */
    public function handlefour()
    {
        $fizzBuzz = new FizzBuzz();
        $expected = '4';
        $this->assertEquals($expected, $fizzBuzz->handleInteger(4));
    }

    /**
     * Create a PHPUnit data provider. This function is responsible for return an array of data that can be supplied as arguments to our Unit Test.
     */
    public  function getData()
    {
        return [
            //each entry represents data passed as arguments to the test. The key is used to identify a particular data set.
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
     * Add the annotation to us data from the specified method.
     * @dataProvider getData()
     */
    public function testWithData($int, $expected)
    {
        $fizzBuzz = new FizzBuzz();
        $this->assertEquals($expected, $fizzBuzz->handleInteger($int));
        //This was way easier right?
    }
}
