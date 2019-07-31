<?php

namespace PanelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AracGrup
 *
 * @ORM\Table(name="arac_grup")
 * @ORM\Entity(repositoryClass="PanelBundle\Repository\AracGrupRepository")
 */
class AracGrup
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
     * @ORM\OneToMany(targetEntity="\PanelBundle\Entity\Arac", mappedBy="aracGrup")
     */
    private $arac;


    /**
     * Get id
     *
     * @return int
     */
    public function getid()
    {
        return $this->id;
    }

    /**
     * Set adi
     *
     * @param string $adi
     *
     * @return AracGrup
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
     * Add arac
     *
     * @param \PanelBundle\Entity\Arac $arac
     * @return AracGrup
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

