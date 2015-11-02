<?php

namespace AppBundle\Twig;

/**
 * Class ActiveStatusExtension
 * @package AppBundle\Twig
 */
class ActiveStatusExtension extends \Twig_Extension
{

    /**
     * @param \Twig_Environment $env
     * @param $status
     * @return string
     */
    public function renderActiveStatus(\Twig_Environment $env, $status)
    {
        //return processed template content
        return $env->render(
            'AppBundle:Status:index.html.twig',
            array(
                'status' => (bool)$status,
            )
        );
    }

    /**
     * @return array
     */
    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter(
                'active_status',
                array($this, 'renderActiveStatus'),
                array(
                    'is_safe' => array('html'),
                    'needs_environment' => true
                )
            ),
        );
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'app_active_status_extension';
    }
}
