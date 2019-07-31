<?php
// src/AppBundle/Twig/AppExtension.php
namespace PanelBundle\Twig;


class PanelExtension extends \Twig_Extension
{
    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('timthumb', array($this, 'timthumb')),
        );
    }



    // Retrieve doctrine from the constructor
    public function __construct()
    {
    }

    public function timthumb($resim, $yol, $w, $h, $zc, $q)
    {
        return '/timthumb.php?src=' . $yol . $resim . '&w=' . $w . '&h=' . $h . '&zc=' . $zc . '&q=' . $q;
    }



}