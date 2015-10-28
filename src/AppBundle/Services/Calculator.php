<?php

namespace AppBundle\Services;

/**
 * Class Calculator
 * @package AppBundle\Services
 */
class Calculator
{
    /**
     * Calculates a sum
     *
     * @param int $a
     * @param int $b
     * @return int
     */
    public function makeSum($a, $b) {
        return $a + $b;
    }

    /**
     * Calculates a product
     *
     * @param int $a
     * @param int $b
     * @return int
     */
    public function makeProduct($a, $b) {
        return $a * $b;
    }
}