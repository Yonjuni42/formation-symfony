<?php

namespace AppBundle\Twig;

use Symfony\Component\Security\Core\Authorization\AuthorizationChecker;

/**
 * Class AuthCheckerExtension
 * @package AppBundle\Twig
 */
class AuthCheckerExtension extends \Twig_Extension
{
    /**
     * @var AuthorizationChecker
     */
    private $checker;

    /**
     * @param AuthorizationChecker $checker
     */
    public function __construct(AuthorizationChecker $checker)
    {
        $this->checker = $checker;
    }

    public function checkAuthorization($role)
    {
        return $this->checker->isGranted($role);
    }

    /**
     * @return array
     */
    public function getFunctions()
    {
        return array(
            new \Twig_SimpleFunction(
                'check_authorization',
                array($this, 'checkAuthorization'),
                array(
                    'is_safe' => array('html')
                )
            ),
        );
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'app_auth_checker_extension';
    }
}