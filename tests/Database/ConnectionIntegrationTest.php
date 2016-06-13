<?php

namespace Tests\Database;

use Aura\Sql\ExtendedPdo;
use Mbright\Database\Connection;
use Mbright\Database\ExtendedPdoFactory;

/**
 * @group Integration
 */
class ConnectionIntegrationTest extends \PHPUnit_Framework_TestCase
{
    /** @var Connection */
    protected $connection;

    /** @var ExtendedPdo */
    protected $pdo;

    protected function addRecord()
    {
        $this->connection->persistMessageHistory('added record');
    }

    public function setUp()
    {
        $factory = new ExtendedPdoFactory();
        $this->pdo = $factory->getPdo();
        $this->connection = new Connection($this->pdo);
        $this->connection->createSchema();
        $this->pdo->beginTransaction();
    }

    public function tearDown()
    {
        $this->pdo->rollBack();
    }

    public function testCanFetch()
    {
        $this->addRecord();
        $this->assertCount(1, $this->connection->fetchAllMessageHistories());
    }

    public function testCanPersist()
    {
        $message = 'CanPersistAndFetch';
        $this->connection->persistMessageHistory($message);
        $results = $this->connection->fetchAllMessageHistories();
        $this->assertCount(1, $results);
    }
}
