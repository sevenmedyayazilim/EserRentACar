<?php

namespace PanelBundle\Controller;

use PanelBundle\Entity\Ofis;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class OfisController extends Controller
{
    public function indexAction()
    {
        return $this->render('@Panel/Ofis/index.html.twig');
    }
    public function getirAction()
    {
        $em = $this->getDoctrine()->getManager();

        $qb = $em->createQueryBuilder();
        $ofisler=$qb->select('o.id,o.adi,o.telefon,o.adres')
                ->from('PanelBundle:Ofis', 'o')
                ->getQuery()
                ->getScalarResult();

        return $this->render('@Panel/Ofis/getir.html.twig',array('ofisler'=>$ofisler));
    }
    public function ekleAction(Request $veri){
        $em = $this->getDoctrine()->getManager();

        $adi=$veri->request->get('adi');
        $telefon=$veri->request->get('telefon');
        $adres=$veri->request->get('adres');

        $ofis = new Ofis();
        $ofis->setAdi($adi);
        $ofis->setTelefon($telefon);
        $ofis->setAdres($adres);
        $em->persist($ofis);


        $em->flush();

        return new Response('');
    }
    public function duzenleAcAction(Request $veri)
    {
        $em = $this->getDoctrine()->getManager();
        $id=$veri->request->get('id');

        $qb = $em->createQueryBuilder();
        $ofis=$qb->select('o.id,o.adi,o.telefon,o.adres')
            ->from('PanelBundle:Ofis', 'o')
            ->where('o.id='.$id)
            ->getQuery()
            ->getScalarResult();

        return $this->render('@Panel/Ofis/duzenleAc.html.twig',array('ofis'=>$ofis[0]));
    }
    public function duzenleAction(Request $veri){
        $em = $this->getDoctrine()->getManager();

        $adi=$veri->request->get('adi');
        $telefon=$veri->request->get('telefon');
        $adres=$veri->request->get('adres');
        $id=$veri->request->get('id');

        $qb=$em->createQueryBuilder();
        $q = $qb->update('PanelBundle:Ofis', 'o')
            ->set('o.adi', ':adi')
            ->set('o.telefon', ':telefon')
            ->set('o.adres', ':adres')
            ->where('o.id = '.$id)
            ->setParameter('adi', $adi)
            ->setParameter('telefon', $telefon)
            ->setParameter('adres', $adres)
            ->getQuery()
            ->execute();

        return new Response('');
    }
    public function silAction(Request $veri){
        $em = $this->getDoctrine()->getManager();

        $id=$veri->request->get('id');

        $qb=$em->createQueryBuilder();
        $qb->delete('PanelBundle:Ofis', 'o')
            ->where('o.id='.$id)
            ->getQuery()
            ->execute();

        return new Response('');
    }
}
