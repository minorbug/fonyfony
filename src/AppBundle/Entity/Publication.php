<?php

// src/AppBundle/Entity/Publication.php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="publication")
 */
class Publication
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $name;

    /**
     * @ORM\Column(type="text")
     */
    protected $description;


    /**
     * @ORM\OneToMany(targetEntity="Edition", mappedBy="publication")
     **/
    private $editions;


    public function __construct()
    {
        $this->editions = new ArrayCollection();
    }

    public function setEditions(ArrayCollection $editions)
    {
        $this->editions = $editions;
        return $this;
    }

    public function addEdition(Edition $edition)
    {
        $this->editions->add($edition);
        return $this;
    }

    public function removeEdition(Edition $edition)
    {
        $this->editions->removeElement($edition);
        return $this;
    }

    public function getEditions()
    {
        return $this->editions;
    }


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
     * Set name
     *
     * @param string $name
     * @return Publication
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Publication
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    public function __toString()
    {
        return (string) $this->getName();
    }
}
