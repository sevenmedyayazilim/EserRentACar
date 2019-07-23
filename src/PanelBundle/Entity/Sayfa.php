<?php

namespace PanelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sayfa
 *
 * @ORM\Table(name="sayfa")
 * @ORM\Entity
 */
class Sayfa
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
     * @var int
     *
     * @ORM\Column(name="ustid", type="integer")
     */
    private $ustid;

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
     * @ORM\Column(name="adi", type="string", length=255)
     */
    private $adi;

    /**
     * @var string
     *
     * @ORM\Column(name="seo", type="string", length=255)
     */
    private $seo;

    /**
     * @var int
     *
     * @ORM\Column(name="banner_durum", type="integer")
     */
    private $bannerDurum;

    /**
     * @var string
     *
     * @ORM\Column(name="banner_url", type="string", length=255, nullable=true)
     */
    private $bannerUrl;

    /**
     * @var int
     *
     * @ORM\Column(name="sira", type="integer")
     */
    private $sira;

    /**
     * @var int
     *
     * @ORM\Column(name="menudegoster", type="integer", nullable=true)
     */
    private $menudegoster;

    /**
     * @ORM\OneToMany(targetEntity="\PanelBundle\Entity\Resim", mappedBy="sayfa")
     */
    private $resim;


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
     * Set ustid
     *
     * @param integer $ustid
     *
     * @return Sayfa
     */
    public function setUstid($ustid)
    {
        $this->ustid = $ustid;

        return $this;
    }

    /**
     * Get ustid
     *
     * @return int
     */
    public function getUstid()
    {
        return $this->ustid;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Sayfa
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
     * @return Sayfa
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
     * @return Sayfa
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
     * Set adi
     *
     * @param string $adi
     *
     * @return Sayfa
     */
    public function setAdi($adi)
    {
        $this->adi = $adi;

        return $this;
    }

    /**
     * Get adi
     *
     * @return string
     */
    public function getAdi()
    {
        return $this->adi;
    }

    /**
     * Set seo
     *
     * @param string $seo
     *
     * @return Sayfa
     */
    public function setSeo($seo)
    {
        $this->seo = $seo;

        return $this;
    }

    /**
     * Get seo
     *
     * @return string
     */
    public function getSeo()
    {
        return $this->seo;
    }

    /**
     * Set bannerDurum
     *
     * @param integer $bannerDurum
     *
     * @return Sayfa
     */
    public function setBannerDurum($bannerDurum)
    {
        $this->bannerDurum = $bannerDurum;

        return $this;
    }

    /**
     * Get bannerDurum
     *
     * @return int
     */
    public function getBannerDurum()
    {
        return $this->bannerDurum;
    }

    /**
     * Set bannerUrl
     *
     * @param string $bannerUrl
     *
     * @return Sayfa
     */
    public function setBannerUrl($bannerUrl)
    {
        $this->bannerUrl = $bannerUrl;

        return $this;
    }

    /**
     * Get bannerUrl
     *
     * @return string
     */
    public function getBannerUrl()
    {
        return $this->bannerUrl;
    }

    /**
     * Set sira
     *
     * @param integer $sira
     *
     * @return Sayfa
     */
    public function setSira($sira)
    {
        $this->sira = $sira;

        return $this;
    }

    /**
     * Get sira
     *
     * @return int
     */
    public function getSira()
    {
        return $this->sira;
    }

    /**
     * Set menudegoster
     *
     * @param integer $menudegoster
     *
     * @return Sayfa
     */
    public function setMenudegoster($menudegoster)
    {
        $this->menudegoster = $menudegoster;

        return $this;
    }

    /**
     * Get menudegoster
     *
     * @return int
     */
    public function getMenudegoster()
    {
        return $this->menudegoster;
    }

    /**
     * Add resim
     *
     * @param \PanelBundle\Entity\Resim $resim
     * @return Sayfa
     */
    public function addResim(\PanelBundle\Entity\Resim $resim)
    {
        $this->resim[] = $resim;

        return $this;
    }

    /**
     * Remove resim
     *
     * @param \PanelBundle\Entity\Resim $resim
     */
    public function removeResim(\PanelBundle\Entity\Resim $resim)
    {
        $this->resim->removeElement($resim);
    }

    /**
     * Get resim
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getResim()
    {
        return $this->resim;
    }


}

