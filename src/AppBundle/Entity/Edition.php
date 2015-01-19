<?php

// src/AppBundle/Entity/Edition.php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="edition")
 */
class Edition
{

    public function __construct()
    {
        $this->pages = new ArrayCollection();
    }

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Publication", inversedBy="editions")
     * @ORM\JoinColumn(name="publication_id", referencedColumnName="id")
     **/
    private $publication;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $name;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $publicationDate;


    /**
     * @ORM\OneToMany(targetEntity="Page", mappedBy="edition")
     **/
    private $pages;


    /**
     * Set publication
     *
     * @param Publication $publication
     * @return Edition
     */
    public function setPublication(Publication $publication = null)
    {
        $this->publication = $publication;

        return $this;
    }

    /**
     * Get publication
     *
     * @return Publication
     */
    public function getPublication()
    {
        return $this->publication;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Edition
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
     * Set publicationDate
     *
     * @param \DateTime $publicationDate
     * @return Edition
     */
    public function setPublicationDate($publicationDate)
    {
        $this->publicationDate = $publicationDate;

        return $this;
    }

    /**
     * Get publicationDate
     *
     * @return \DateTime 
     */
    public function getPublicationDate()
    {
        return $this->publicationDate;
    }

    /**
     * Add pages
     *
     * @param Page $pages
     * @return Edition
     */
    public function addPage(Page $pages)
    {
        $this->pages[] = $pages;

        return $this;
    }

    /**
     * Remove pages
     *
     * @param Page $pages
     */
    public function removePage(Page $pages)
    {
        $this->pages->removeElement($pages);
    }

    /**
     * Get pages
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPages()
    {
        return $this->pages;
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


    public function __toString()
    {
        return (string) $this->getName()." (".count($this->getPages())." pages)";
    }
}
