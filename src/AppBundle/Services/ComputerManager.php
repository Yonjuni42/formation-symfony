<?php

namespace AppBundle\Services;
use Doctrine\ORM\EntityManager;

/**
 * Class ComputerManager
 * @package AppBundle\Services
 */
class ComputerManager
{
    /**
     * @var EntityManager
     */
    private $em;

    /**
     * @param EntityManager $em
     */
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    /**
     * @return array
     */
    public function getComputers()
    {
        return $this->em->getRepository('AppBundle:Computer')->findAll();
    }

    /**
     * @return EntityManager
     */
    public function getEntityManager()
    {
        return $this->em;
    }

    /**
     * Sets all computers to enabled/disabled
     *
     * @param $enabled
     */
    public function setComputers($enabled) {
        $computers = $this->getComputers();

        foreach ($computers as $computer) {
            $computer->setEnabled($enabled);
        }
        $this->em->flush();
    }
}