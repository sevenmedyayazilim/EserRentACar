<?php

namespace PanelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Yetki
 *
 * @ORM\Table(name="yetki")
 * @ORM\Entity
 */
class Yetki
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
     * @var int
     *
     * @ORM\Column(name="gorme", type="integer", nullable=true)
     */
    private $gorme;

    /**
     * @var int
     *
     * @ORM\Column(name="ekleme", type="integer", nullable=true)
     */
    private $ekleme;

    /**
     * @var int
     *
     * @ORM\Column(name="duzenleme", type="integer", nullable=true)
     */
    private $duzenleme;

    /**
     * @var int
     *
     * @ORM\Column(name="silme", type="integer", nullable=true)
     */
    private $silme;

    /**
     * @var int
     *
     * @ORM\Column(name="siralama", type="integer", nullable=true)
     */
    private $siralama;

    /**
     * @ORM\ManyToOne(targetEntity="\PanelBundle\Entity\User", inversedBy="yetki")
     * @ORM\JoinColumn(name="kullanici_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $kullanici;


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
     * @return Yetki
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
     * Set gorme
     *
     * @param integer $gorme
     *
     * @return Yetki
     */
    public function setGorme($gorme)
    {
        $this->gorme = $gorme;

        return $this;
    }

    /**
     * Get gorme
     *
     * @return int
     */
    public function getGorme()
    {
        return $this->gorme;
    }

    /**
     * Set ekleme
     *
     * @param integer $ekleme
     *
     * @return Yetki
     */
    public function setEkleme($ekleme)
    {
        $this->ekleme = $ekleme;

        return $this;
    }

    /**
     * Get ekleme
     *
     * @return int
     */
    public function getEkleme()
    {
        return $this->ekleme;
    }

    /**
     * Set duzenleme
     *
     * @param integer $duzenleme
     *
     * @return Yetki
     */
    public function setDuzenleme($duzenleme)
    {
        $this->duzenleme = $duzenleme;

        return $this;
    }

    /**
     * Get duzenleme
     *
     * @return int
     */
    public function getDuzenleme()
    {
        return $this->duzenleme;
    }

    /**
     * Set silme
     *
     * @param integer $silme
     *
     * @return Yetki
     */
    public function setSilme($silme)
    {
        $this->silme = $silme;

        return $this;
    }

    /**
     * Get silme
     *
     * @return int
     */
    public function getSilme()
    {
        return $this->silme;
    }

    /**
     * Set siralama
     *
     * @param integer $siralama
     *
     * @return Yetki
     */
    public function setSiralama($siralama)
    {
        $this->siralama = $siralama;

        return $this;
    }

    /**
     * Get siralama
     *
     * @return int
     */
    public function getSiralama()
    {
        return $this->siralama;
    }

    /**
     * Set kullanici
     *
     * @param \PanelBundle\Entity\User $kullanici
     * @return Yetki
     */
    public function setKullanici(\PanelBundle\Entity\User $kullanici = null)
    {
        $this->kullanici = $kullanici;

        return $this;
    }

    /**
     * Get kullanici
     *
     * @return Yetki
     */
    public function getKullanici()
    {
        return $this->kullanici;
    }


}

