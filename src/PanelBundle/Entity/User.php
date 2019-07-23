<?php

namespace PanelBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="kullanicilar")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=55, nullable=true)
     */
    private $adi;

    /**
     * @ORM\Column(type="string", length=55, nullable=true)
     */
    private $soyadi;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $telefon;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $unvan;

    /**
     * @ORM\OneToMany(targetEntity="\PanelBundle\Entity\Yetki", mappedBy="kullanici")
     */
    private $yetki;


    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

    /**
     * Set adi
     *
     * @param string $adi
     * @return User
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
     * Set soyadi
     *
     * @param string $soyadi
     * @return User
     */
    public function setSoyadi($soyadi)
    {
        $this->soyadi = $soyadi;

        return $this;
    }

    /**
     * Get soyadi
     *
     * @return string
     */
    public function getSoyadi()
    {
        return $this->soyadi;
    }

    /**
     * Set telefon
     *
     * @param string $telefon
     * @return User
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
     * Set unvan
     *
     * @param string $unvan
     * @return User
     */
    public function setUnvan($unvan)
    {
        $this->unvan = $unvan;

        return $this;
    }

    /**
     * Get unvan
     *
     * @return string
     */
    public function getUnvan()
    {
        return $this->unvan;
    }


    /**
     * Add yetki
     *
     * @param \PanelBundle\Entity\Yetki $yetki
     * @return User
     */
    public function addYetki(\PanelBundle\Entity\Yetki $yetki)
    {
        $this->yetki[] = $yetki;

        return $this;
    }

    /**
     * Remove yetki
     *
     * @param \PanelBundle\Entity\Yetki $yetki
     */
    public function removeYetki(\PanelBundle\Entity\Yetki $yetki)
    {
        $this->yetki->removeElement($yetki);
    }

    /**
     * Get yetki
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getYetki()
    {
        return $this->yetki;
    }


}