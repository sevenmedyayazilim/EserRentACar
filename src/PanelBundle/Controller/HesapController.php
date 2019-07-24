<?php

namespace PanelBundle\Controller;

use PanelBundle\Entity\Ofis;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class HesapController extends Controller
{
    public function indexAction()
    {
        return $this->render('@Panel/Hesap/index.html.twig');
    }
    public function bilgileriKaydetAction(Request $veri){
        $em = $this->getDoctrine()->getManager();

        $kullaniciadi=$veri->request->get('kullaniciadi');
        $adi=$veri->request->get('adi');
        $soyadi=$veri->request->get('soyadi');
        $eposta=$veri->request->get('eposta');
        $telefon=$veri->request->get('telefon');
        $unvan=$veri->request->get('unvan');
        $id=$veri->request->get('id');

        $qb = $em->createQueryBuilder();
        $kullaniciUsername=$qb->select('count(u.id) as sayi')
            ->from('PanelBundle:User', 'u')
            ->where("u.username = '".$kullaniciadi."' and u.id not in(".$id.")")
            ->getQuery()
            ->getScalarResult();
        if ($kullaniciUsername[0]['sayi']!=0){
            return new Response('Kullanıcı adı kullanılmaktadır.');
        }

        $qb = $em->createQueryBuilder();
        $kullaniciEmail=$qb->select('count(u.id) as sayi')
            ->from('PanelBundle:User', 'u')
            ->where("u.email = '".$eposta."' and u.id not in(".$id.")")
            ->getQuery()
            ->getScalarResult();
        if ($kullaniciEmail[0]['sayi']!=0){
            return new Response('E-Posta adresi kullanılmaktadır.');
        }

        $qb=$em->createQueryBuilder();
        $q = $qb->update('PanelBundle:User', 'u')
            ->set('u.username', ':username')
            ->set('u.adi', ':adi')
            ->set('u.soyadi', ':soyadi')
            ->set('u.email', ':email')
            ->set('u.emailCanonical', ':emailCanonical')
            ->set('u.telefon', ':telefon')
            ->set('u.unvan', ':unvan')
            ->where('u.id = '.$id)
            ->setParameter('username', $kullaniciadi)
            ->setParameter('adi', $adi)
            ->setParameter('soyadi', $soyadi)
            ->setParameter('email', $eposta)
            ->setParameter('emailCanonical', $eposta)
            ->setParameter('telefon', $telefon)
            ->setParameter('unvan', $unvan)
            ->getQuery()
            ->execute();

        return new Response('');
    }

}
