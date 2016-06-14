<?php

namespace Mbright\Model;

/**
 * Class that the rest of the application will use to handle all things FizzBuzz related
 */
class FizzBuzz
{
    /** @var Printer  */
    protected $printer;

    public function __construct(Printer $printer)
    {
        $this->printer = $printer;
    }

    /**
     * Change the FizzBuzz implementation to use the new Printer class and and return the desired format.
     *
     * @return string
     */
    public function handleInteger($int, $format = 'string')
    {
        $this->printer->setFormat($format);
        switch (true) {
            case $int % 15 === 0:
                $output = $this->printer->handleFizzBuzz();
                break;
            case $int % 5 === 0:
                $output = $this->printer->handleBuzz();
                break;
            case ($int % 3 === 0):
                $output = $this->printer->handleFizz();
                break;
            default:
                $output = $this->printer->handleInteger($int);
        }
        return $output;
    }
}