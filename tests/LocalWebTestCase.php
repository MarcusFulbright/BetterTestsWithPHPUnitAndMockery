<?php

namespace Mbright\Tests;

class LocalWebTestCase extends \PHPUnit_Framework_TestCase
{
    /** @var \GuzzleHttp\Client */
    protected $guzzle;

    protected $pid;

    public function setUp()
    {
        // Command that starts the built-in web server
        $command = 'php -S localhost:8000 -t ..public/ >/dev/null 2>&1 & echo $!';

        // Execute the command and store the process ID
        $output = [];
        exec($command, $output);
        $this->pid = (int) $output[0];
        //create a guzzle client to use for tests
        $this->guzzle = new \GuzzleHttp\Client();
    }

    public function tearDown()
    {
        //kill the web server
        posix_kill($this->pid,0);
    }
}
