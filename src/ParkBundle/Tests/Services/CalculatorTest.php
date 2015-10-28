<?php

namespace ParkBundle\Tests\Services;

use ParkBundle\Services\Calculator;

/**
 * Class CalculatorTest
 * @package ParkBundle\Tests\Services
 */
class CalculatorTest extends \PHPUnit_Framework_TestCase
{
    public function testAdd()
    {
        $calc = new Calculator();

        $result = $calc->makeSum(22, 20);
        $this->assertEquals(42, $result, 'Apprends à compter');

        $result = $calc->makeSum(22, 22);
        $this ->assertNotEquals(42, $result);
    }
}