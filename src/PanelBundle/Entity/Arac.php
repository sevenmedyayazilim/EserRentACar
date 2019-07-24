<?php

namespace PanelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Arac
 *
 * @ORM\Table(name="arac")
 * @ORM\Entity(repositoryClass="PanelBundle\Repository\AracRepository")
 */
class Arac
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
     * @ORM\Column(name="kisa_Aciklama", type="text", nullable=true)
     */
    private $kisaAciklama;

    /**
     * @var float
     *
     * @ORM\Column(name="listeFiyat", type="float")
     */
    private $listeFiyat;

    /**
     * @var float
     *
     * @ORM\Column(name="onlineRezervasyonFiyat", type="float", nullable=true)
     */
    private $onlineRezervasyonFiyat;

    /**
     * @var float
     *
     * @ORM\Column(name="indirim1", type="float", nullable=true)
     */
    private $indirim1;

    /**
     * @var int
     *
     * @ORM\Column(name="indirim1tip", type="integer", nullable=true)
     */
    private $indirim1tip;

    /**
     * @var float
     *
     * @ORM\Column(name="indirim2", type="float", nullable=true)
     */
    private $indirim2;

    /**
     * @var int
     *
     * @ORM\Column(name="indirim2tip", type="integer", nullable=true)
     */
    private $indirim2tip;

    /**
     * @var float
     *
     * @ORM\Column(name="indirim3", type="float", nullable=true)
     */
    private $indirim3;

    /**
     * @var int
     *
     * @ORM\Column(name="indirim3tip", type="integer", nullable=true)
     */
    private $indirim3tip;

    /**
     * @var float
     *
     * @ORM\Column(name="indirim4", type="float", nullable=true)
     */
    private $indirim4;

    /**
     * @var int
     *
     * @ORM\Column(name="indirim4tip", type="integer", nullable=true)
     */
    private $indirim4tip;

    /**
     * @var float
     *
     * @ORM\Column(name="indirim5", type="float", nullable=true)
     */
    private $indirim5;

    /**
     * @var int
     *
     * @ORM\Column(name="indirim5tip", type="integer", nullable=true)
     */
    private $indirim5tip;

    /**
     * @var int
     *
     * @ORM\Column(name="yetiskinSayisi", type="integer")
     */
    private $yetiskinSayisi;

    /**
     * @var int
     *
     * @ORM\Column(name="buyukBavul", type="integer")
     */
    private $buyukBavul;

    /**
     * @var int
     *
     * @ORM\Column(name="kucukBavul", type="integer")
     */
    private $kucukBavul;

    /**
     * @var int
     *
     * @ORM\Column(name="yasSiniri", type="integer")
     */
    private $yasSiniri;

    /**
     * @var int
     *
     * @ORM\Column(name="yasSiniriTip", type="integer")
     */
    private $yasSiniriTip;

    /**
     * @var string
     *
     * @ORM\Column(name="yakitTipi", type="string", length=255)
     */
    private $yakitTipi;

    /**
     * @var string
     *
     * @ORM\Column(name="airbag", type="string", length=255)
     */
    private $airbag;

    /**
     * @var string
     *
     * @ORM\Column(name="vitesTuru", type="string", length=255)
     */
    private $vitesTuru;

    /**
     * @var string
     *
     * @ORM\Column(name="abs", type="string", length=255)
     */
    private $abs;

    /**
     * @var int
     *
     * @ORM\Column(name="kmSiniri", type="integer")
     */
    private $kmSiniri;

    /**
     * @var float
     *
     * @ORM\Column(name="kkBlokeTutar", type="float")
     */
    private $kkBlokeTutar;

    /**
     * @var int
     *
     * @ORM\Column(name="ehliyetYasi", type="integer")
     */
    private $ehliyetYasi;

    /**
     * @var int
     *
     * @ORM\Column(name="ehliyetYasiTip", type="integer")
     */
    private $ehliyetYasiTip;

    /**
     * @var string
     *
     * @ORM\Column(name="renk", type="string", length=255)
     */
    private $renk;

    /**
     * @ORM\ManyToOne(targetEntity="\PanelBundle\Entity\Ofis", inversedBy="arac")
     * @ORM\JoinColumn(name="ofis_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $ofis;


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
     * @return Arac
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
     * Set kisaAciklama
     *
     * @param string $kisaAciklama
     *
     * @return Arac
     */
    public function setKisaAciklama($kisaAciklama)
    {
        $this->kisaAciklama = $kisaAciklama;

        return $this;
    }

    /**
     * Get kisaAciklama
     *
     * @return string
     */
    public function getKisaAciklama()
    {
        return $this->kisaAciklama;
    }

    /**
     * Set listeFiyat
     *
     * @param float $listeFiyat
     *
     * @return Arac
     */
    public function setListeFiyat($listeFiyat)
    {
        $this->listeFiyat = $listeFiyat;

        return $this;
    }

    /**
     * Get listeFiyat
     *
     * @return float
     */
    public function getListeFiyat()
    {
        return $this->listeFiyat;
    }

    /**
     * Set onlineRezervasyonFiyat
     *
     * @param float $onlineRezervasyonFiyat
     *
     * @return Arac
     */
    public function setOnlineRezervasyonFiyat($onlineRezervasyonFiyat)
    {
        $this->onlineRezervasyonFiyat = $onlineRezervasyonFiyat;

        return $this;
    }

    /**
     * Get onlineRezervasyonFiyat
     *
     * @return float
     */
    public function getOnlineRezervasyonFiyat()
    {
        return $this->onlineRezervasyonFiyat;
    }

    /**
     * Set indirim1
     *
     * @param float $indirim1
     *
     * @return Arac
     */
    public function setIndirim1($indirim1)
    {
        $this->indirim1 = $indirim1;

        return $this;
    }

    /**
     * Get indirim1
     *
     * @return float
     */
    public function getIndirim1()
    {
        return $this->indirim1;
    }

    /**
     * Set indirim1tip
     *
     * @param integer $indirim1tip
     *
     * @return Arac
     */
    public function setIndirim1tip($indirim1tip)
    {
        $this->indirim1tip = $indirim1tip;

        return $this;
    }

    /**
     * Get indirim1tip
     *
     * @return int
     */
    public function getIndirim1tip()
    {
        return $this->indirim1tip;
    }

    /**
     * Set indirim2
     *
     * @param float $indirim2
     *
     * @return Arac
     */
    public function setIndirim2($indirim2)
    {
        $this->indirim2 = $indirim2;

        return $this;
    }

    /**
     * Get indirim2
     *
     * @return float
     */
    public function getIndirim2()
    {
        return $this->indirim2;
    }

    /**
     * Set indirim2tip
     *
     * @param integer $indirim2tip
     *
     * @return Arac
     */
    public function setIndirim2tip($indirim2tip)
    {
        $this->indirim2tip = $indirim2tip;

        return $this;
    }

    /**
     * Get indirim2tip
     *
     * @return int
     */
    public function getIndirim2tip()
    {
        return $this->indirim2tip;
    }

    /**
     * Set indirim3
     *
     * @param float $indirim3
     *
     * @return Arac
     */
    public function setIndirim3($indirim3)
    {
        $this->indirim3 = $indirim3;

        return $this;
    }

    /**
     * Get indirim3
     *
     * @return float
     */
    public function getIndirim3()
    {
        return $this->indirim3;
    }

    /**
     * Set indirim3tip
     *
     * @param integer $indirim3tip
     *
     * @return Arac
     */
    public function setIndirim3tip($indirim3tip)
    {
        $this->indirim3tip = $indirim3tip;

        return $this;
    }

    /**
     * Get indirim3tip
     *
     * @return int
     */
    public function getIndirim3tip()
    {
        return $this->indirim3tip;
    }

    /**
     * Set indirim4
     *
     * @param float $indirim4
     *
     * @return Arac
     */
    public function setIndirim4($indirim4)
    {
        $this->indirim4 = $indirim4;

        return $this;
    }

    /**
     * Get indirim4
     *
     * @return float
     */
    public function getIndirim4()
    {
        return $this->indirim4;
    }

    /**
     * Set indirim4tip
     *
     * @param integer $indirim4tip
     *
     * @return Arac
     */
    public function setIndirim4tip($indirim4tip)
    {
        $this->indirim4tip = $indirim4tip;

        return $this;
    }

    /**
     * Get indirim4tip
     *
     * @return int
     */
    public function getIndirim4tip()
    {
        return $this->indirim4tip;
    }

    /**
     * Set indirim5
     *
     * @param float $indirim5
     *
     * @return Arac
     */
    public function setIndirim5($indirim5)
    {
        $this->indirim5 = $indirim5;

        return $this;
    }

    /**
     * Get indirim5
     *
     * @return float
     */
    public function getIndirim5()
    {
        return $this->indirim5;
    }

    /**
     * Set indirim5tip
     *
     * @param integer $indirim5tip
     *
     * @return Arac
     */
    public function setIndirim5tip($indirim5tip)
    {
        $this->indirim5tip = $indirim5tip;

        return $this;
    }

    /**
     * Get indirim5tip
     *
     * @return int
     */
    public function getIndirim5tip()
    {
        return $this->indirim5tip;
    }

    /**
     * Set yetiskinSayisi
     *
     * @param integer $yetiskinSayisi
     *
     * @return Arac
     */
    public function setYetiskinSayisi($yetiskinSayisi)
    {
        $this->yetiskinSayisi = $yetiskinSayisi;

        return $this;
    }

    /**
     * Get yetiskinSayisi
     *
     * @return int
     */
    public function getYetiskinSayisi()
    {
        return $this->yetiskinSayisi;
    }

    /**
     * Set buyukBavul
     *
     * @param integer $buyukBavul
     *
     * @return Arac
     */
    public function setBuyukBavul($buyukBavul)
    {
        $this->buyukBavul = $buyukBavul;

        return $this;
    }

    /**
     * Get buyukBavul
     *
     * @return int
     */
    public function getBuyukBavul()
    {
        return $this->buyukBavul;
    }

    /**
     * Set kucukBavul
     *
     * @param integer $kucukBavul
     *
     * @return Arac
     */
    public function setKucukBavul($kucukBavul)
    {
        $this->kucukBavul = $kucukBavul;

        return $this;
    }

    /**
     * Get kucukBavul
     *
     * @return int
     */
    public function getKucukBavul()
    {
        return $this->kucukBavul;
    }

    /**
     * Set yasSiniri
     *
     * @param integer $yasSiniri
     *
     * @return Arac
     */
    public function setYasSiniri($yasSiniri)
    {
        $this->yasSiniri = $yasSiniri;

        return $this;
    }

    /**
     * Get yasSiniri
     *
     * @return int
     */
    public function getYasSiniri()
    {
        return $this->yasSiniri;
    }

    /**
     * Set yasSiniriTip
     *
     * @param integer $yasSiniriTip
     *
     * @return Arac
     */
    public function setYasSiniriTip($yasSiniriTip)
    {
        $this->yasSiniriTip = $yasSiniriTip;

        return $this;
    }

    /**
     * Get yasSiniriTip
     *
     * @return int
     */
    public function getYasSiniriTip()
    {
        return $this->yasSiniriTip;
    }

    /**
     * Set yakitTipi
     *
     * @param string $yakitTipi
     *
     * @return Arac
     */
    public function setYakitTipi($yakitTipi)
    {
        $this->yakitTipi = $yakitTipi;

        return $this;
    }

    /**
     * Get yakitTipi
     *
     * @return string
     */
    public function getYakitTipi()
    {
        return $this->yakitTipi;
    }

    /**
     * Set airbag
     *
     * @param string $airbag
     *
     * @return Arac
     */
    public function setAirbag($airbag)
    {
        $this->airbag = $airbag;

        return $this;
    }

    /**
     * Get airbag
     *
     * @return string
     */
    public function getAirbag()
    {
        return $this->airbag;
    }

    /**
     * Set vitesTuru
     *
     * @param string $vitesTuru
     *
     * @return Arac
     */
    public function setVitesTuru($vitesTuru)
    {
        $this->vitesTuru = $vitesTuru;

        return $this;
    }

    /**
     * Get vitesTuru
     *
     * @return string
     */
    public function getVitesTuru()
    {
        return $this->vitesTuru;
    }

    /**
     * Set abs
     *
     * @param string $abs
     *
     * @return Arac
     */
    public function setAbs($abs)
    {
        $this->abs = $abs;

        return $this;
    }

    /**
     * Get abs
     *
     * @return string
     */
    public function getAbs()
    {
        return $this->abs;
    }

    /**
     * Set kmSiniri
     *
     * @param integer $kmSiniri
     *
     * @return Arac
     */
    public function setKmSiniri($kmSiniri)
    {
        $this->kmSiniri = $kmSiniri;

        return $this;
    }

    /**
     * Get kmSiniri
     *
     * @return int
     */
    public function getKmSiniri()
    {
        return $this->kmSiniri;
    }

    /**
     * Set kkBlokeTutar
     *
     * @param float $kkBlokeTutar
     *
     * @return Arac
     */
    public function setKkBlokeTutar($kkBlokeTutar)
    {
        $this->kkBlokeTutar = $kkBlokeTutar;

        return $this;
    }

    /**
     * Get kkBlokeTutar
     *
     * @return float
     */
    public function getKkBlokeTutar()
    {
        return $this->kkBlokeTutar;
    }

    /**
     * Set ehliyetYasi
     *
     * @param integer $ehliyetYasi
     *
     * @return Arac
     */
    public function setEhliyetYasi($ehliyetYasi)
    {
        $this->ehliyetYasi = $ehliyetYasi;

        return $this;
    }

    /**
     * Get ehliyetYasi
     *
     * @return int
     */
    public function getEhliyetYasi()
    {
        return $this->ehliyetYasi;
    }

    /**
     * Set ehliyetYasiTip
     *
     * @param integer $ehliyetYasiTip
     *
     * @return Arac
     */
    public function setEhliyetYasiTip($ehliyetYasiTip)
    {
        $this->ehliyetYasiTip = $ehliyetYasiTip;

        return $this;
    }

    /**
     * Get ehliyetYasiTip
     *
     * @return int
     */
    public function getEhliyetYasiTip()
    {
        return $this->ehliyetYasiTip;
    }

    /**
     * Set renk
     *
     * @param string $renk
     *
     * @return Arac
     */
    public function setRenk($renk)
    {
        $this->renk = $renk;

        return $this;
    }

    /**
     * Get renk
     *
     * @return string
     */
    public function getRenk()
    {
        return $this->renk;
    }

    /**
     * Set ofis
     *
     * @param \PanelBundle\Entity\Ofis $ofis
     * @return Arac
     */
    public function setOfis(\PanelBundle\Entity\Ofis $ofis = null)
    {
        $this->ofis = $ofis;

        return $this;
    }

    /**
     * Get ofis
     *
     * @return Arac
     */
    public function getArac()
    {
        return $this->ofis;
    }
}

