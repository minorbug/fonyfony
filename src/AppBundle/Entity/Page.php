<?php

// src/AppBundle/Entity/Page.php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\Annotation\Exclude;

/**
 * @ORM\Entity
 * @ORM\Table(name="page")
 */
class Page
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Edition", inversedBy="pages")
     * @ORM\JoinColumn(name="edition_id", referencedColumnName="id")
     * @Exclude
     **/
    private $edition;

    /**
     * @ORM\Column(type="string", length=4)
     */
    protected $pageNumber;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $pathPdf;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $pathJpg;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $pathThumb;

    /**
     * @ORM\Column(type="text")
     * @Exclude
     */
    protected $pageText;

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
     * Set pageNumber
     *
     * @param string $pageNumber
     * @return Page
     */
    public function setPageNumber($pageNumber)
    {
        $this->pageNumber = $pageNumber;

        return $this;
    }

    /**
     * Get pageNumber
     *
     * @return string 
     */
    public function getPageNumber()
    {
        return $this->pageNumber;
    }

    /**
     * Set pathPdf
     *
     * @param string $pathPdf
     * @return Page
     */
    public function setPathPdf($pathPdf)
    {
        $this->pathPdf = $pathPdf;

        return $this;
    }

    /**
     * Get pathPdf
     *
     * @return string 
     */
    public function getPathPdf()
    {
        return $this->pathPdf;
    }

    /**
     * Set pathJpg
     *
     * @param string $pathJpg
     * @return Page
     */
    public function setPathJpg($pathJpg)
    {
        $this->pathJpg = $pathJpg;

        return $this;
    }

    /**
     * Get pathJpg
     *
     * @return string 
     */
    public function getPathJpg()
    {
        return $this->pathJpg;
    }

    /**
     * Set pathThumb
     *
     * @param string $pathThumb
     * @return Page
     */
    public function setPathThumb($pathThumb)
    {
        $this->pathThumb = $pathThumb;

        return $this;
    }

    /**
     * Get pathThumb
     *
     * @return string 
     */
    public function getPathThumb()
    {
        return $this->pathThumb;
    }

    /**
     * Set pageText
     *
     * @param string $pageText
     * @return Page
     */
    public function setPageText($pageText)
    {
        $this->pageText = $pageText;

        return $this;
    }

    /**
     * Get pageText
     *
     * @return string 
     */
    public function getPageText()
    {
        return $this->pageText;
    }

    /**
     * Set edition
     *
     * @param Edition $edition
     * @return Page
     */
    public function setEdition(Edition $edition = null)
    {
        $this->edition = $edition;

        return $this;
    }

    /**
     * Get edition
     *
     * @return Edition
     */
    public function getEdition()
    {
        return $this->edition;
    }

    public function __toString()
    {
        return (string) "Page "+$this->getPageNumber();
    }


}
