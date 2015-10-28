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
}