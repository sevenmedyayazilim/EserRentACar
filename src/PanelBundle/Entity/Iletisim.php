<?php

namespace PanelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Iletisim
 *
 * @ORM\Table(name="iletisim")
 * @ORM\Entity
 */
class Iletisim
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
     * @ORM\Column(name="adres", type="text")
     */
    private $adres;

    /**
     * @var string
     *
     * @ORM\Column(name="telefon", type="string", length=255)
     */
    private $telefon;

    /**
     * @var string
     *
     * @ORM\Column(name="fax", type="string", length=255, nullable=true)
     */
    private $fax;

    /**
     * @var string
     *
     * @ORM\Column(name="gsm", type="string", length=255, nullable=true)
     */
    private $gsm;

    /**
     * @var string
     *
     * @ORM\Column(name="eposta", type="string", length=255)
     */
    private $eposta;

    /**
     * @var string
     *
     * @ORM\Column(name="harita", type="text")
     */
    private $harita;



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
     * Set adres
     *
     * @param string $adres
     *
     * @return Iletisim
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
     * Set telefon
     *
     * @param string $telefon
     *
     * @return Iletisim
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
     * Set fax
     *
     * @param string $fax
     *
     * @return Iletisim
     */
    public function setFax($fax)
    {
        $this->fax = $fax;

        return $this;
    }

    /**
     * Get fax
     *
     * @return string
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * Set gsm
     *
     * @param string $gsm
     *
     * @return Iletisim
     */
    public function setGsm($gsm)
    {
        $this->gsm = $gsm;

        return $this;
    }

    /**
     * Get gsm
     *
     * @return string
     */
    public function getGsm()
    {
        return $this->gsm;
    }

    /**
     * Set eposta
     *
     * @param string $eposta
     *
     * @return Iletisim
     */
    public function setEposta($eposta)
    {
        $this->eposta = $eposta;

        return $this;
    }

    /**
     * Get eposta
     *
     * @return string
     */
    public function getEposta()
    {
        return $this->eposta;
    }

    /**
     * Set enlem
     *
     * @param string $enlem
     *
     * @return Iletisim
     */
    public function setEnlem($enlem)
    {
        $this->enlem = $enlem;

        return $this;
    }

    /**
     * Get enlem
     *
     * @return string
     */
    public function getEnlem()
    {
        return $this->enlem;
    }

    /**
     * Set boylam
     *
     * @param string $boylam
     *
     * @return Iletisim
     */
    public function setBoylam($boylam)
    {
        $this->boylam = $boylam;

        return $this;
    }

    /**
     * Get boylam
     *
     * @return string
     */
    public function getBoylam()
    {
        return $this->boylam;
    }

    /**
     * Set harita
     *
     * @param string $harita
     *
     * @return Iletisim
     */
    public function setHarita($harita)
    {
        $this->harita = $harita;

        return $this;
    }

    /**
     * Get harita
     *
     * @return string
     */
    public function getHarita()
    {
        return $this->harita;
    }
}

