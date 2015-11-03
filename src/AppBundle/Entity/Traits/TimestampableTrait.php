<?php

namespace AppBundle\Entity\Traits;

use Doctrine\ORM\Mapping as ORM;

/**
 * Trait TimestampableTrait
 * @package AppBundle\Entity\Traits
 */
trait TimestampableTrait
{
    /**
     * @var
     * @ORM\Column(name="createdAt", type="datetime", nullable=true)
     */
    protected $createdAt;

    /**
     * @var
     * @ORM\Column(name="modifiedAt", type="datetime", nullable=true)
     */
    protected $modifiedAt;

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param mixed $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return mixed
     */
    public function getModifiedAt()
    {
        return $this->modifiedAt;
    }

    /**
     * @param mixed $modifiedAt
     */
    public function setModifiedAt($modifiedAt)
    {
        $this->modifiedAt = $modifiedAt;
    }

    /**
     * Sets timestamp to current time when creating the entity
     * @ORM\PrePersist
     */
    public function creationTimestamp() {
       $this->setCreatedAt(new \DateTime('now'));
    }

    /**
     * Sets timestamp to current time when updating the entity
     * @ORM\PreUpdate
     */
    public function updateTimestamp() {
        $this->setModifiedAt(new \DateTime('now'));
    }
}