<?php

namespace Tests\Unit\Model;

use Mbright\Model\Printer;

/**
 * @group Unit
 */
class PrinterUnitTest extends \PHPUnit_Framework_TestCase
{
    protected $printer;

    public function setUp()
    {
        $this->printer = new Printer();
    }

    public function testFizzString()
    {
        $expected = 'Fizz';
        $actual = $this->printer->handleFizz();
        $this->assertEquals($expected, $actual);
    }

    public function fizzProvider()
    {
        return [
            'string' => ['string', 'Fizz'],
            'json' => ['json', json_encode(['message' => 'Fizz'])]
        ];
    }

    /**
     * @dataProvider fizzProvider
     */
    public function testFizz($format, $output)
    {
        $this->printer->setFormat($format);
        $this->assertEquals($output, $this->printer->handleFizz());
    }

    public function buzzProvider()
    {
        return [
            'string' => ['string', 'Buzz'],
            'json' => ['json', json_encode(['message' => 'Buzz'])]
        ];
    }

    /**
     * @dataProvider buzzProvider
     */
    public function testBuzz($format, $output)
    {
        $this->printer->setFormat($format);
        $this->assertEquals($output, $this->printer->handleBuzz());
    }

    public function fizzBuzzProvider()
    {
        return [
            'string' => ['string', 'FizzBuzz'],
            'json' => ['json', json_encode(['message' => 'FizzBuzz'])]
        ];
    }

    /**
     * @dataProvider fizzBuzzProvider
     */
    public function testFizzBuzz($format, $output)
    {
        $printer = new Printer();
        $printer->setFormat($format);
        $this->assertEquals($output, $printer->handleFizzBuzz($format));
    }

    public function integerProvider()
    {
        return [
            'string' => ['string', 1, 1],
            'json' => ['json', 1, json_encode(['message' => 1])]
        ];
    }

    /**
     * @dataProvider integerProvider
     */
    public function testInteger($format, $input, $output)
    {
        $printer = new Printer();
        $printer->setFormat($format);
        $this->assertEquals($output, $printer->handleInteger($input));
    }
}