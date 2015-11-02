<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * Class SecurityController
 * @package AppBundle\Controller
 */
class SecurityController extends Controller
{
    /**
     * Login
     *
     * @Route("/login", name="security_login")
     * @Method("GET")
     * @Template()
     */
    public function loginAction()
    {
        if ($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            return $this->redirectToRoute('default');
        }
        $authenticationUtils = $this->get('security.authentication_utils');

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return array(
            // last username entered by the user
            'last_username' => $lastUsername,
            'error' => $error,
        );
    }

    /**
     * Login check
     *
     * @Route("/login_check", name="security_login_check")
     */
    public function loginCheckAction()
    {
    }

    /**
     * Logout
     *
     * @Route("/logout", name="security_logout")
     */
    public function logoutAction()
    {
    }

}