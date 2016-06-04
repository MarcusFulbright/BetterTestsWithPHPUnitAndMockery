<?php

namespace Tests\Integration\Model;

use Mbright\Model\FizzBuzz;
use Mbright\Model\Printer;

class FizzBuzzTest extends \PHPUnit_Framework_TestCase
{
    public function fizzBuzzProvider()
    {
        return [
            'test one' => ['string', 1, 1],
            'test two' => ['string', 2, 2],
            'test three' => ['string', 3, 'Fizz'],
            'test four' => ['string', 4, 4],
            'test five' => ['string', 5, 'Buzz'],
            'test six' => ['string', 6, 'Fizz'],
            'test seven' => ['string', 7, 7],
            'test eight' => ['string', 8, 8],
            'test nine' => ['string', 9, 'Fizz'],
            'test ten' => ['string', 10, 'Buzz'],
            'test eleven' => ['string', 11, 11],
            'test twelve' => ['string', 12, 'Fizz'],
            'test thirteen' => ['string', 13, 13],
            'test fourteen' => ['string', 14, 14],
            'test fifteen' => ['string', 15, 'FizzBuzz'],
            'test one json' => ['json', 1, json_encode(['message' => 1])],
            'test two json' => ['json', 2, json_encode(['message' => 2])],
            'test three json' => ['json', 3, json_encode(['message' => 'Fizz'])],
            'test four json' => ['json', 4, json_encode(['message' => 4])],
            'test five json' => ['json', 5, json_encode(['message' => 'Buzz'])],
            'test six json' => ['json', 6, json_encode(['message' => 'Fizz'])],
            'test seven json' => ['json', 7, json_encode(['message' => 7])],
            'test eight json' => ['json', 8, json_encode(['message' => 8])],
            'test nine json' => ['json', 9, json_encode(['message' => 'Fizz'])],
            'test ten json' => ['json', 10, json_encode(['message' => 'Buzz'])],
            'test eleven json' => ['json', 11, json_encode(['message' => 11])],
            'test twelve json' => ['json', 12, json_encode(['message' => 'Fizz'])],
            'test thirteen json' => ['json', 13, json_encode(['message' => 13])],
            'test fourteen json' => ['json', 14, json_encode(['message' => 14])],
            'test fifteen json' => ['json', 15, json_encode(['message' => 'FizzBuzz'])]
        ];
    }

    /**
     * @dataProvider fizzBuzzProvider
     */
    public function testFizzBuzz($format, $input, $expected)
    {
        $printer = new Printer();
        $fizzBuzz = new FizzBuzz($printer);
        $this->assertEquals($expected, $fizzBuzz->handleInteger($input, $format));
    }
}