<?php
namespace PanelBundle\Controller;



use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Doctrine\Bundle\DoctrineBundle\Registry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;
use Doctrine\Common\Annotations\AnnotationReader;
use Symfony\Component\Serializer\Mapping\Loader\AnnotationLoader;
use Doctrine\ORM\Cache;
use Doctrine\ORM\Cache\DefaultCacheFactory;




class BaseController extends Controller
{

    function seo($sef)
    {
        $tr = array('ı', 'İ', 'ğ', 'Ğ', 'ü', 'Ü', 'ö', 'Ö', 'Ç', 'ç', 'ş', 'Ş', ' ');
        $eng = array('i', 'i', 'g', 'g', 'u', 'u', 'o', 'o', 'c', 'c', 's', 's', '_');
        $sef = str_replace($tr, $eng, $sef);
        $sef = mb_strtolower($sef);
        $sef = preg_replace('/&.+?;/', '', $sef);
        $sef = preg_replace('/[^%a-z0-9_-]/', '', $sef);
        $sef = str_replace("\\", "", $sef);
        $sef = str_replace('"', "", $sef);
        $sef = preg_replace("/'/", "", $sef);
        $sef = preg_replace("/%/", "", $sef);
        $sef = preg_replace("/ +/", " ", $sef);
        $sef = preg_replace("/\s/", "", $sef);
        $sef = preg_replace('/-+/', '_', $sef);
        $sef = preg_replace('|-+|', '_', $sef);
        $sef = trim($sef, '_');
        return $sef;
    }

    function rasgele($uzunluk)
    {
        $key='';
        $karakterler = "1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        for($i=0;$i<$uzunluk;$i++)
        {
            $key .= $karakterler{rand(0,35)};
        }
        return $key;
    }
    function rasgeleSayi($uzunluk)
    {
        $key='';
        $karakterler = "1234567890";
        for($i=0;$i<$uzunluk;$i++)
        {
            $key .= $karakterler{rand(0,35)};
        }
        return $key;
    }

    function uzantiBul($type){
        if($type=='image/jpeg'){ return '.jpg'; }
        elseif($type=='image/png'){ return '.png'; }
        elseif($type=='image/gif'){ return '.gif'; }
        else{ return '.belirsiz'; }
    }

}