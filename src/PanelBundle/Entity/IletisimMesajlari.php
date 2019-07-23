<?php

namespace PanelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * IletisimMesajlari
 *
 * @ORM\Table(name="iletisim_mesajlari")
 * @ORM\Entity
 */
class IletisimMesajlari
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
     * @ORM\Column(name="adsoyad", type="string", length=255)
     */
    private $adsoyad;

    /**
     * @var string
     *
     * @ORM\Column(name="eposta", type="string", length=255)
     */
    private $eposta;

    /**
     * @var string
     *
     * @ORM\Column(name="telefon", type="string", length=255, nullable=true)
     */
    private $telefon;

    /**
     * @var string
     *
     * @ORM\Column(name="konu", type="string", length=255)
     */
    private $konu;

    /**
     * @var string
     *
     * @ORM\Column(name="mesaj", type="text")
     */
    private $mesaj;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="tarih", type="datetime")
     */
    private $tarih;

    /**
     * @var int
     *
     * @ORM\Column(name="okuma", type="integer")
     */
    private $okuma;


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
     * Set adsoyad
     *
     * @param string $adsoyad
     *
     * @return IletisimMesajlari
     */
    public function setAdsoyad($adsoyad)
    {
        $this->adsoyad = $adsoyad;

        return $this;
    }

    /**
     * Get adsoyad
     *
     * @return string
     */
    public function getAdsoyad()
    {
        return $this->adsoyad;
    }

    /**
     * Set eposta
     *
     * @param string $eposta
     *
     * @return IletisimMesajlari
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
     * Set telefon
     *
     * @param string $telefon
     *
     * @return IletisimMesajlari
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
     * Set konu
     *
     * @param string $konu
     *
     * @return IletisimMesajlari
     */
    public function setKonu($konu)
    {
        $this->konu = $konu;

        return $this;
    }

    /**
     * Get konu
     *
     * @return string
     */
    public function getKonu()
    {
        return $this->konu;
    }

    /**
     * Set mesaj
     *
     * @param string $mesaj
     *
     * @return IletisimMesajlari
     */
    public function setMesaj($mesaj)
    {
        $this->mesaj = $mesaj;

        return $this;
    }

    /**
     * Get mesaj
     *
     * @return string
     */
    public function getMesaj()
    {
        return $this->mesaj;
    }

    /**
     * Set tarih
     *
     * @param \DateTime $tarih
     *
     * @return IletisimMesajlari
     */
    public function setTarih($tarih)
    {
        $this->tarih = $tarih;

        return $this;
    }

    /**
     * Get tarih
     *
     * @return \DateTime
     */
    public function getTarih()
    {
        return $this->tarih;
    }

    /**
     * Set okuma
     *
     * @param integer $okuma
     *
     * @return IletisimMesajlari
     */
    public function setOkuma($okuma)
    {
        $this->okuma = $okuma;

        return $this;
    }

    /**
     * Get okuma
     *
     * @return int
     */
    public function getOkuma()
    {
        return $this->okuma;
    }
}

