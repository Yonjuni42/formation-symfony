<?php

namespace ParkBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * Class CalculatorController
 * @package ParkBundle\Controller
 *
 * @Route("/calculator")
 */
class CalculatorController extends Controller
{
    /**
     * Calculates sum
     *
     * @Route("/sum/{a}/{b}", name="calculator_sum", requirements={"a": "\d+", "b": "\d+"})
     * @Method("GET")
     * @Template("ParkBundle:Calculator:result.html.twig")
     */
    public function sumAction($a, $b)
    {
        $result = $this->get('park.calculator')->makeSum($a, $b);
        return array('result' => $result);
    }

    /**
     * Calculates product
     *
     * @Route("/product/{a}/{b}", name="calculator_product", requirements={"a": "\d+", "b": "\d+"})
     * @Method("GET")
     * @Template("ParkBundle:Calculator:result.html.twig")
     */
    public function productAction($a, $b)
    {
        $result = $this->get('park.calculator')->makeProduct($a, $b);
        return array('result' => $result);
    }
}
