<?php

namespace Mbright\Tests\Database;

use Mbright\Database\ExtendedPdoFactory;

class ExtendedPdoFactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testGetPdo()
    {
        $factory = new ExtendedPdoFactory();
        $this->assertInstanceOf(\Aura\Sql\ExtendedPdo::class, $factory->getPdo());
    }
}
