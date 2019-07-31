<?php

namespace PanelBundle\Controller;

use PanelBundle\Entity\AracGrup;
use PanelBundle\Entity\Ofis;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AracGrupController extends Controller
{
    public function indexAction()
    {
        return $this->render('@Panel/AracGrup/index.html.twig');
    }
    public function getirAction()
    {
        $em = $this->getDoctrine()->getManager();

        $qb = $em->createQueryBuilder();
        $aracGruplari=$qb->select('ag.id,ag.adi')
            ->from('PanelBundle:AracGrup', 'ag')
            ->getQuery()
            ->getScalarResult();

        return $this->render('@Panel/AracGrup/getir.html.twig',array('aracGruplari'=>$aracGruplari));
    }
    public function ekleAction(Request $veri){
        $em = $this->getDoctrine()->getManager();

        $adi=$veri->request->get('adi');


        $grup = new AracGrup();
        $grup->setAdi($adi);
        $em->persist($grup);



        $em->flush();

        return new Response('');
    }
    public function duzenleAcAction(Request $veri)
    {
        $em = $this->getDoctrine()->getManager();
        $id=$veri->request->get('id');

        $qb = $em->createQueryBuilder();
        $grup=$qb->select('ag.id,ag.adi')
            ->from('PanelBundle:AracGrup', 'ag')
            ->where('ag.id='.$id)
            ->getQuery()
            ->getScalarResult();

        return $this->render('@Panel/AracGrup/duzenleAc.html.twig',array('grup'=>$grup[0]));
    }
    public function duzenleAction(Request $veri){
        $em = $this->getDoctrine()->getManager();

        $adi=$veri->request->get('adi');
        $id=$veri->request->get('id');

        $qb=$em->createQueryBuilder();
        $q = $qb->update('PanelBundle:AracGrup', 'ag')
            ->set('ag.adi', ':adi')
            ->where('ag.id = '.$id)
            ->setParameter('adi', $adi)
            ->getQuery()
            ->execute();

        return new Response('');
    }
    public function silAction(Request $veri){
        $em = $this->getDoctrine()->getManager();

        $id=$veri->request->get('id');

        $qb=$em->createQueryBuilder();
        $qb->delete('PanelBundle:AracGrup', 'ag')
            ->where('ag.id='.$id)
            ->getQuery()
            ->execute();

        return new Response('');
    }


}
