<?php

namespace PanelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ofis
 *
 * @ORM\Table(name="ofis")
 * @ORM\Entity(repositoryClass="PanelBundle\Repository\OfisRepository")
 */
class Ofis
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
     * @ORM\Column(name="adi", type="string", length=255)
     */
    private $adi;

    /**
     * @var string
     *
     * @ORM\Column(name="telefon", type="string", length=255)
     */
    private $telefon;

    /**
     * @var string
     *
     * @ORM\Column(name="adres", type="text")
     */
    private $adres;

    /**
     * @ORM\OneToMany(targetEntity="\PanelBundle\Entity\Arac", mappedBy="ofis")
     */
    private $arac;

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
     * Set adi
     *
     * @param string $adi
     *
     * @return Ofis
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
     * Set telefon
     *
     * @param string $telefon
     *
     * @return Ofis
     */
    public function setTelefon($telefon)
    {
        $this->telefon = $telefon;

        return $this;
    }

    /**
     * Get telefon
     *
     * @return string
     */
    public function getTelefon()
    {
        return $this->telefon;
    }

    /**
     * Set adres
     *
     * @param string $adres
     *
     * @return Ofis
     */
    public function setAdres($adres)
    {
        $this->adres = $adres;

        return $this;
    }

    /**
     * Get adres
     *
     * @return string
     */
    public function getAdres()
    {
        return $this->adres;
    }


    /**
     * Add arac
     *
     * @param \PanelBundle\Entity\Arac $arac
     * @return Ofis
     */
    public function addArac(\PanelBundle\Entity\Arac $arac)
    {
        $this->arac[] = $arac;

        return $this;
    }

    /**
     * Remove arac
     *
     * @param \PanelBundle\Entity\Arac $arac
     */
    public function removeArac(\PanelBundle\Entity\Arac $arac)
    {
        $this->arac->removeElement($arac);
    }

    /**
     * Get arac
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getArac()
    {
        return $this->arac;
    }
}

