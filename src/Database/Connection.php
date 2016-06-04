<?php

namespace Mbright\Database;

use Aura\Sql\ExtendedPdo;

class Connection
{
    /** @var ExtendedPdo */
    protected $pdo;

    public function __construct(ExtendedPdo $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getPdo()
    {
        return $this->pdo;
    }

    /**
     * Used to create a the database schema, meant to only be ran once during bootstrap.
     */
    public function createSchema()
    {
        $pdo = $this->getPdo();
        $pdo->exec('create table if not exists fizzbuzz_message_history (id INT not null AUTO_INCREMENT PRIMARY KEY, message VARCHAR(20) not null, created_at DATETIME)');
    }

    /**
     * Used to create a a DB record of a fizzbuzz message.
     *
     * @param string $message
     */
    public function persistMessageHistory($message)
    {
        $pdo = $this->getPdo();
        $sql = 'insert into fizzbuzz_message_history (message, created_at) VALUES (:message, :created_at)';
        $dt = new \DateTime();
        $binds = [
            'message' => $message,
            'created_at' => $dt->format('Y-m-d H:i:s')
        ];
        return $pdo->perform($sql, $binds);
    }

    /**
     * Will fetch all message history records.
     *
     * @return array
     */
    public function fetchAllMessageHistories()
    {
        $sql = 'select * from fizzbuzz_message_history';
        return $this->pdo->fetchAll($sql);
    }
}