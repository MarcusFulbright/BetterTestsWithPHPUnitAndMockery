<?php

namespace Mbright\Tests\Functional;

use Mbright\Tests\LocalWebTestCase;

/**
 * @group Functional
 */
class APITest extends LocalWebTestCase
{
    public function testFizzBuzzResponse()
    {
        $response = $this->guzzle->request('GET', '127.0.0.1:8000/fizzbuzz/3');
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals('application/json', $response->getHeader('Content-type')[0]);
        $this->assertEquals(json_encode(['message' => 'Fizz']), $response->getBody()->getContents());
    }
}