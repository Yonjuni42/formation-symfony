<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * Class DefaultController
 * @package AppBundle\Controller
 *
 */
class DefaultController extends Controller
{

    /**
     *
     * @Route("/", name="default")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        return array();
    }
}
