<?php

namespace PanelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Resim
 *
 * @ORM\Table(name="resim")
 * @ORM\Entity
 */
class Resim
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
     * @ORM\Column(name="baslik", type="string", length=255, nullable=true)
     */
    private $baslik;

    /**
     * @var string
     *
     * @ORM\Column(name="resim", type="string", length=255)
     */
    private $resim;

    /**
     * @var int
     *
     * @ORM\Column(name="dilgrup", type="integer")
     */
    private $dilgrup;

    /**
     * @var int
     *
     * @ORM\Column(name="sunucu", type="integer", nullable=true)
     */
    private $sunucu;

    /**
     * @var int
     *
     * @ORM\Column(name="sira", type="integer")
     */
    private $sira;

    /**
     * @var int
     *
     * @ORM\Column(name="ana", type="integer", nullable=true)
     */
    private $ana;

    /**
     * @ORM\ManyToOne(targetEntity="\PanelBundle\Entity\Sayfa", inversedBy="resim")
     * @ORM\JoinColumn(name="sayfa_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $sayfa;

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
     * Set baslik
     *
     * @param string $baslik
     *
     * @return Resim
     */
    public function setBaslik($baslik)
    {
        $this->baslik = $baslik;

        return $this;
    }

    /**
     * Get baslik
     *
     * @return string
     */
    public function getBaslik()
    {
        return $this->baslik;
    }

    /**
     * Set resim
     *
     * @param string $resim
     *
     * @return Resim
     */
    public function setResim($resim)
    {
        $this->resim = $resim;

        return $this;
    }

    /**
     * Get resim
     *
     * @return string
     */
    public function getResim()
    {
        return $this->resim;
    }

    /**
     * Set sunucu
     *
     * @param integer $sunucu
     *
     * @return Resim
     */
    public function setSunucu($sunucu)
    {
        $this->sunucu = $sunucu;

        return $this;
    }

    /**
     * Get sunucu
     *
     * @return int
     */
    public function getSunucu()
    {
        return $this->sunucu;
    }

    /**
     * Set sira
     *
     * @param integer $sira
     *
     * @return Resim
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
     * Set ana
     *
     * @param integer $ana
     *
     * @return Resim
     */
    public function setAna($ana)
    {
        $this->ana = $ana;

        return $this;
    }

    /**
     * Get ana
     *
     * @return int
     */
    public function getAna()
    {
        return $this->ana;
    }

    /**
     * Set sayfa
     *
     * @param \PanelBundle\Entity\Sayfa $sayfa
     * @return Resim
     */
    public function setSayfa(\PanelBundle\Entity\Sayfa $sayfa = null)
    {
        $this->sayfa = $sayfa;

        return $this;
    }

    /**
     * Get sayfa
     *
     * @return Resim
     */
    public function getSayfa()
    {
        return $this->sayfa;
    }

}

