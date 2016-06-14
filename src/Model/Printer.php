<?php

namespace Mbright\Model;

class Printer
{
    /** @var string */
    protected $format = 'string';

    /** Receive the format */
    public function getFormat()
    {
        return $this->format;
    }

    /** Set the format */
    public function setFormat($format)
    {
        $this->format = $format;
    }

    //Set up methods for each print case that prints the desired format

    public function handleFizz()
    {
        if ($this->format === 'string') {
            $output = 'Fizz';
        }
        if ($this->format === 'json') {
            $output = json_encode(['message' => 'Fizz']);
        }
        return $output;
    }

    public function handleBuzz()
    {
        if ($this->format === 'string') {
            $output = 'Buzz';
        }
        if ($this->format === 'json') {
            $output = json_encode(['message' => 'Buzz']);
        }
        return $output;
    }

    public function handleFizzBuzz()
    {
        if ($this->format === 'string') {
            $output = 'FizzBuzz';
        }
        if ($this->format === 'json') {
            $output = json_encode(['message' => 'FizzBuzz']);
        }
        return $output;
    }

    public function handleInteger($int)
    {
        if ($this->format === 'string') {
            $output = $int;
        }
        if ($this->format === 'json') {
            $output = json_encode(['message' => $int]);
        }
        return $output;
    }
}