<?php

namespace Mbright\Database;

use Aura\Sql\ExtendedPdo;

class ExtendedPdoFactory
{
    /**
     * Used to create an ExtendedPdo object with the appropriate parameters.
     *
     * @return ExtendedPdo
     */
    public function getPdo()
    {
        $driver = getenv('DB_DRIVER');
        $db_name = getenv('DB_NAME');
        $dsn = "$driver:host=localhost;dbname=$db_name";
        return new ExtendedPdo($dsn, getenv('DB_USER'), getenv('DB_PASS'));
    }
}