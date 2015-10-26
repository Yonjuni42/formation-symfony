<?php

namespace ParkBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ComputerController extends Controller
{
    public function computerAction()
    {
        $computerList = $this->getComputerList();
        //$computerList = array();
        return $this->render('ParkBundle:Computer:list.html.twig', array('computers' => $computerList));
    }

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
