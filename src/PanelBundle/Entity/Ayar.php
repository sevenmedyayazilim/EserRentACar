<?php

namespace PanelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ayar
 *
 * @ORM\Table(name="ayar")
 * @ORM\Entity
 */
class Ayar
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="siteadi", type="string", length=255)
     */
    private $siteadi;

    /**
     * @var string
     *
     * @ORM\Column(name="siteyolu", type="string", length=255)
     */
    private $siteyolu;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="keywords", type="text", nullable=true)
     */
    private $keywords;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="logo", type="string", length=255, nullable=true)
     */
    private $logo;


    /**
     * @var string
     *
     * @ORM\Column(name="footerlogo", type="string", length=255, nullable=true)
     */
    private $footerlogo;

    /**
     * @var string
     *
     * @ORM\Column(name="favicon", type="string", length=255, nullable=true)
     */
    private $favicon;

    /**
     * @var string
     *
     * @ORM\Column(name="google_analytics", type="text", nullable=true)
     */
    private $googleAnalytics;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set siteadi
     *
     * @param string $siteadi
     *
     * @return Ayar
     */
    public function setSiteadi($siteadi)
    {
        $this->siteadi = $siteadi;

        return $this;
    }

    /**
     * Get siteadi
     *
     * @return string
     */
    public function getSiteadi()
    {
        return $this->siteadi;
    }

    /**
     * Set siteyolu
     *
     * @param string $siteyolu
     *
     * @return Ayar
     */
    public function setSiteyolu($siteyolu)
    {
        $this->siteyolu = $siteyolu;

        return $this;
    }

    /**
     * Get siteyolu
     *
     * @return string
     */
    public function getSiteyolu()
    {
        return $this->siteyolu;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Ayar
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set keywords
     *
     * @param string $keywords
     *
     * @return Ayar
     */
    public function setKeywords($keywords)
    {
        $this->keywords = $keywords;

        return $this;
    }

    /**
     * Get keywords
     *
     * @return string
     */
    public function getKeywords()
    {
        return $this->keywords;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Ayar
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

    /**
     * Set logo
     *
     * @param string $logo
     *
     * @return Ayar
     */
    public function setLogo($logo)
    {
        $this->logo = $logo;

        return $this;
    }

    /**
     * Get logo
     *
     * @return string
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * Set footerlogo
     *
     * @param string $footerlogo
     *
     * @return Ayar
     */
    public function setFooterlogo($footerlogo)
    {
        $this->footerlogo = $footerlogo;

        return $this;
    }

    /**
     * Get footerlogo
     *
     * @return string
     */
    public function getFooterlogo()
    {
        return $this->footerlogo;
    }

    /**
     * Set favicon
     *
     * @param string $favicon
     *
     * @return Ayar
     */
    public function setFavicon($favicon)
    {
        $this->favicon = $favicon;

        return $this;
    }

    /**
     * Get favicon
     *
     * @return string
     */
    public function getFavicon()
    {
        return $this->favicon;
    }

    /**
     * Set googleAnalytics
     *
     * @param string $googleAnalytics
     *
     * @return Ayar
     */
    public function setGoogleAnalytics($googleAnalytics)
    {
        $this->googleAnalytics = $googleAnalytics;

        return $this;
    }

    /**
     * Get googleAnalytics
     *
     * @return string
     */
    public function getGoogleAnalytics()
    {
        return $this->googleAnalytics;
    }


}

