<?php

namespace Mbright\Tests\Database;

use Mbright\Database\Connection;
use Mockery\MockInterface;

/**
 * @group Unit
 */
class ConnectionUnitTest extends \PHPUnit_Framework_TestCase
{
    /** @var MockInterface */
    protected $pdo;

    /** @var  Connection */
    protected $connection;

    public function setUp()
    {
        $this->pdo = \Mockery::mock(\Aura\Sql\ExtendedPdo::class);
        $this->connection = new Connection($this->pdo);
    }

    /**
     * Validate that the perform method gets called with the correct message. No need to verify the SQL or date time as
     * those values are hardcoded.
     */
    public function testPersistMessageHistory()
    {
        $message = 'testMessage';
        //define a closure function used to validate arguments that get passed to $pdo->perform()
        $validate_args = function($sql, $binds) use ($message) {
            return $binds['message'] === $message;
        };
        $this->pdo->shouldReceive('perform')->with($validate_args);
    }

    public function testFetchAllHistories()
    {
        $this->pdo->shouldReceive('fetchAll')->with('select * from fizzbuzz_message_history');
        $this->connection->fetchAllMessageHistories();
    }
}
