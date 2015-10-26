<?php

namespace ParkBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * Class ComputerController
 * @package ParkBundle\Controller
 */
class ComputerController extends Controller
{
    /**
     * @Route("/park/computer")
     * @Template()
     */
    public function listAction()
    {
        $computerList = $this->getComputerList();
        //$computerList = array();
        return array('computers' => $computerList);
    }

    /**
     * @return array Park computer list
     */
    protected function getComputerList()
    {
        $list = array(
            array(
                'id' => 1,
                'name' => 'Ordinateur 1',
                'ip' => '192.168.0.1',
                'enabled' => true
            ),
            array(
                'id' => 2,
                'name' => 'Ordinateur 2',
                'ip' => '192.168.0.2',
                'enabled' => false
            ),
            array(
                'id' => 3,
                'name' => 'Ordinateur 3',
                'ip' => '192.168.0.3',
                'enabled' => true
            ),
            array(
                'id' => 4,
                'name' => 'Ordinateur 4',
                'ip' => '192.168.0.4',
                'enabled' => false
            )
        );
        return $list;
    }
}
