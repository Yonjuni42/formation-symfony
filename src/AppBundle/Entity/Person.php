<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Person
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\PersonRepository")
 */
class Person
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="firstName", type="string", length=100)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="lastName", type="string", length=100)
     */
    private $lastName;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Computer", mappedBy="person", cascade={"persist"})
     */
    private $computers;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     * @return Person
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string 
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     * @return Person
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->lastName;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->computers = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add computers
     *
     * @param \AppBundle\Entity\Computer $computers
     * @return Person
     */
    public function addComputer(\AppBundle\Entity\Computer $computers)
    {
        $computers->setPerson($this);
        $this->computers[] = $computers;

        return $this;
    }

    /**
     * Remove computers
     *
     * @param \AppBundle\Entity\Computer $computers
     */
    public function removeComputer(\AppBundle\Entity\Computer $computers)
    {
        $this->computers->removeElement($computers);
    }

    /**
     * Get computers
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getComputers()
    {
        return $this->computers;
    }

    public function __toString()
    {
        return "$this->firstName $this->lastName";
    }
}
