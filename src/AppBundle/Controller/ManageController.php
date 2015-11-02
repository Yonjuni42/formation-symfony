<?php

namespace AppBundle\Controller;

use AppBundle\Services\ComputerManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * Class ManageController
 * @package AppBundle\Controller
 *
 * @Route("/park/manage")
 */
class ManageController extends Controller
{
    /**
     * @var ComputerManager
     */
    private $compManager;

    /**
     * @Route("/", name="manage")
     * @Method("GET")
     * @Template()
     */
    public function manageAction()
    {
        return(array());
    }

    /**
     * @Route("/enable", name="manage_enable")
     * @Method("GET")
     */
    public function enableAction()
    {
        $this->setComps(true);
        return($this->redirectToRoute('computer'));
    }

    /**
     * @Route("/disable", name="manage_disable")
     * @Method("GET")
     */
    public function disableAction()
    {
        $this->setComps(false);
        return($this->redirectToRoute('computer'));
    }

    private function setComps($enabled) {
        $this->compManager = $this->get('app.computer_manager');
        $this->compManager->setComputers($enabled);
    }
}