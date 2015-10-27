<?php

namespace ParkBundle\Twig;

/**
 * Class ComputerStatusExtension
 * @package ParkBundle\Twig
 */
class ComputerStatusExtension extends \Twig_Extension
{

    /**
     * @param \Twig_Environment $env
     * @param $status
     * @return string
     */
    public function renderComputerStatus(\Twig_Environment $env, $status)
    {
        //return processed template content
        return $env->render(
            'ParkBundle:Computer:Status/index.html.twig',
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
                'computer_status',
                array($this, 'renderComputerStatus'),
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
        return 'park_computer_status_extension';
    }
}
