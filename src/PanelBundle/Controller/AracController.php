<?php

namespace PanelBundle\Controller;

use PanelBundle\Controller\BaseController as Controller;
use PanelBundle\Entity\Arac;
use PanelBundle\Entity\Ofis;
use PanelBundle\Entity\Resim;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AracController extends Controller
{
    public function indexAction()
    {
        return $this->render('@Panel/Arac/index.html.twig');
    }
    public function getirAction()
    {
        $em = $this->getDoctrine()->getManager();

        $qb = $em->createQueryBuilder();
        $araclar=$qb->select('a.id,a.plaka,a.marka,a.model,a.motorHacmi,a.paket,a.yil,a.listeFiyat,a.onlineRezervasyonFiyat,ag.adi as grup,o.adi as ofis')
            ->from('PanelBundle:Arac', 'a')
            ->join('a.ofis','o')
            ->join('a.aracGrup','ag')
            ->where('a.durum=1')
            ->getQuery()
            ->getScalarResult();

        return $this->render('@Panel/Arac/getir.html.twig',array('araclar'=>$araclar));
    }
    public function ekleAction()
    {
        $em = $this->getDoctrine()->getManager();

        $qb = $em->createQueryBuilder();
        $ofisler=$qb->select('o.adi,o.id')
            ->from('PanelBundle:Ofis', 'o')
            ->getQuery()
            ->getScalarResult();

        $qb = $em->createQueryBuilder();
        $aracGruplari=$qb->select('ag.adi,ag.id')
            ->from('PanelBundle:AracGrup', 'ag')
            ->getQuery()
            ->getScalarResult();


        $qb = $em->createQueryBuilder();
        $arac=$qb->select('o.id as ofisid,ag.id as aracgrupid,a.id,a.marka,a.model,a.motorHacmi,a.paket,a.yil,a.listeFiyat,a.onlineRezervasyonFiyat,a.indirim1,a.indirim1tip,a.indirim2,a.indirim2tip,a.indirim3,a.indirim3tip,a.indirim4,a.indirim4tip,a.indirim5,a.indirim5tip,a.yetiskinSayisi,a.buyukBavul,a.kucukBavul,a.yasSiniri,a.yakitTipi,a.airbag,a.vitesTuru,a.abs,a.kmSiniri,a.kkBlokeTutar,a.ehliyetYasi,a.renk,a.kasaTipi,a.klima,a.plaka')
            ->from('PanelBundle:Arac', 'a')
            ->join('a.ofis','o')
            ->join('a.aracGrup','ag')
            ->where('a.durum=0')
            ->getQuery()
            ->getScalarResult();


        if(empty($arac[0])){
            $this->get('session')->set('aracid','');
            return $this->render('@Panel/Arac/ekle.html.twig',array('ofisler'=>$ofisler,'aracGruplari'=>$aracGruplari));
        }else{
            $this->get('session')->set('aracid',$arac[0]['id']);
            return $this->render('@Panel/Arac/devam.html.twig',array('ofisler'=>$ofisler,'aracGruplari'=>$aracGruplari,'arac'=>$arac[0]));
        }

    }

    public function ekle_kayitAction(Request $veri){
         $em = $this->getDoctrine()->getManager();

         $ofis=$veri->request->get('ofis');
         $arac_grup=$veri->request->get('arac_grup');
         $plaka=$veri->request->get('plaka');
         $marka=$veri->request->get('marka');
         $model=$veri->request->get('model');
         $motor_hacmi=$veri->request->get('motor_hacmi');
         $paket=$veri->request->get('paket');
         $yil=$veri->request->get('yil');
         $kasa_tipi=$veri->request->get('kasa_tipi');
         $vites_tipi=$veri->request->get('vites_tipi');
         $yakit_tipi=$veri->request->get('yakit_tipi');
         $renk=$veri->request->get('renk');
         $liste_fiyat=$veri->request->get('liste_fiyat');
         $online_rezervasyon_fiyat=$veri->request->get('online_rezervasyon_fiyat');
         $kk_bloke_tutar=$veri->request->get('kk_bloke_tutar');
         $indirim1=$veri->request->get('indirim1');
         $indirim1Tip=$veri->request->get('indirim1Tip');
         $indirim2=$veri->request->get('indirim2');
         $indirim2Tip=$veri->request->get('indirim2Tip');
         $indirim3=$veri->request->get('indirim3');
         $indirim3Tip=$veri->request->get('indirim3Tip');
         $indirim4=$veri->request->get('indirim4');
         $indirim4Tip=$veri->request->get('indirim4Tip');
         $indirim5=$veri->request->get('indirim5');
         $indirim5Tip=$veri->request->get('indirim5Tip');
         $yetiskin_sayisi=$veri->request->get('yetiskin_sayisi');
         $buyuk_bavul=$veri->request->get('buyuk_bavul');
         $kucuk_bavul=$veri->request->get('kucuk_bavul');
         $yas_siniri=$veri->request->get('yas_siniri');
         $airbag=$veri->request->get('airbag');
         $abs=$veri->request->get('abs');
         $klima=$veri->request->get('klima');
         $km_siniri=$veri->request->get('km_siniri');
         $ehliyet_yasi=$veri->request->get('ehliyet_yasi');
         $islem=$veri->request->get('islem');

         $ofis = $em->getReference('PanelBundle:Ofis',$ofis);

         $arac_grup = $em->getReference('PanelBundle:AracGrup',$arac_grup);

         $aracid = $this->get('session')->get('aracid');
         if(empty($aracid)){
             $arac = new Arac();
         }else{
             $arac = $em->getRepository('PanelBundle:Arac')->find($aracid);
         }
         $arac->setOfis($ofis);
         $arac->setAracGrup($arac_grup);
         $arac->setPlaka($plaka);
         $arac->setMarka($marka);
         $arac->setModel($model);
         $arac->setMotorHacmi($motor_hacmi);
         if (!empty($paket)) {
             $arac->setPaket($paket);
         }
         if (!empty($yil)) {
            $arac->setYil($yil);
         }
         $arac->setKasaTipi($kasa_tipi);
         $arac->setVitesTuru($vites_tipi);
         $arac->setYakitTipi($yakit_tipi);
         $arac->setRenk($renk);
         $arac->setListeFiyat($liste_fiyat);
         $arac->setOnlineRezervasyonFiyat($online_rezervasyon_fiyat);
         $arac->setKkBlokeTutar($kk_bloke_tutar);
         if (!empty($indirim1)) {
            $arac->setIndirim1($indirim1);
         }
         if (!empty($indirim1Tip)) {
             $arac->setIndirim1tip($indirim1Tip);
         }
          if (!empty($indirim2)) {
            $arac->setIndirim2($indirim2);
         }
         if (!empty($indirim2Tip)) {
             $arac->setIndirim2tip($indirim2Tip);
         }
          if (!empty($indirim3)) {
            $arac->setIndirim3($indirim3);
         }
         if (!empty($indirim3Tip)) {
             $arac->setIndirim3tip($indirim3Tip);
         }
          if (!empty($indirim4)) {
            $arac->setIndirim4($indirim4);
         }
         if (!empty($indirim4Tip)) {
             $arac->setIndirim4tip($indirim4Tip);
         }
          if (!empty($indirim5)) {
            $arac->setIndirim5($indirim5);
         }
         if (!empty($indirim5Tip)) {
             $arac->setIndirim5tip($indirim5Tip);
         }
         $arac->setYetiskinSayisi($yetiskin_sayisi);
         $arac->setBuyukBavul($buyuk_bavul);
         $arac->setKucukBavul($kucuk_bavul);
         $arac->setYasSiniri($yas_siniri);
         $arac->setAirbag($airbag);
         $arac->setAbs($abs);
         $arac->setKlima($klima);
         $arac->setKmSiniri($km_siniri);
         $arac->setEhliyetYasi($ehliyet_yasi);
         if ($islem=='duzenle'){
             $arac->setDurum(1);
         }else{
             $arac->setDurum(0);
         }
         $em->persist($arac);
         $em->flush();
         $this->get('session')->set('aracid',$arac->getId());

         return new Response('');

    }

    public function yarimkalan_silAction(){
        $em = $this->getDoctrine()->getManager();

        $qb=$em->createQueryBuilder();
        $qb->delete('PanelBundle:Arac', 'a')
            ->where('a.durum=1')
            ->getQuery()
            ->execute();

        $this->get('session')->set('aracid','');

        return new Response('');
    }

    public function resim_yukleAction(Request $veri){
        error_reporting(-1);
        ini_set("display_errors","on");


        $em = $this->getDoctrine()->getManager();

        $qb = $em->createQueryBuilder();
        $arac=$qb->select('a.id,a.marka,a.model')
            ->from('PanelBundle:Arac', 'a')
            ->where('a.id='.$this->get('session')->get('aracid'))
            ->getQuery()
            ->getScalarResult();
        $aracRef = $em->getReference('PanelBundle:Arac',$this->get('session')->get('aracid'));

            $type=$this->uzantiBul($_FILES['file']['type']);

            $rand=$this->rasgele(10);
            $resim_adi=$this->seo($arac[0]['marka'].'-'.$arac[0]['model']).'_'.md5(sha1($arac[0]['id'].'_'.time().'_'.$rand));

            $yukle =  move_uploaded_file($_FILES['file']['tmp_name'],'uploads/'.$resim_adi.$type);

            if ($yukle){
                $resim = new Resim();
                $resim->setBaslik($arac[0]['marka'].' '.$arac[0]['model']);
                $resim->setResim($resim_adi.$type);
                $resim->setAna(0);
                $resim->setSira(0);
                $resim->setArac($aracRef);
                $em->persist($resim);
            }


        $em->flush();
        return new Response();
    }

    public function resim_getirAction(Request $veri)
    {
        $em = $this->getDoctrine()->getManager();
        $aracid = $this->get('session')->get('aracid');

        $qb = $em->createQueryBuilder();
        $resimler=$qb->select('r.resim,r.id,a.id as aid,r.ana')
            ->from('PanelBundle:Resim', 'r')
            ->join('r.arac','a')
            ->where('a.id='.$aracid)
            ->orderBy('r.sira', 'asc')
            ->getQuery()
            ->getScalarResult();


        return $this->render('@Panel/Arac/resim_getir.html.twig',array('resimler'=>$resimler));
    }

    public function resim_silAction(Request $veri){
        $em = $this->getDoctrine()->getManager();
        $id = $veri->request->get('id');

        $qb = $em->createQueryBuilder();
        $resim=$qb->select('r.resim')
            ->from('PanelBundle:Resim', 'r')
            ->where('r.id='.$id)
            ->getQuery()
            ->getScalarResult();

        if (file_exists('uploads/'.$resim[0]['resim'])) {
            unlink('uploads/'.$resim[0]['resim']);
        }

        $qb=$em->createQueryBuilder();
        $qb->delete('PanelBundle:Resim', 'r')
            ->where('r.id='.$id)
            ->getQuery()
            ->execute();

            return new Response('');
    }
    public function resim_anaAction(Request $veri){
        $em = $this->getDoctrine()->getManager();
        $resimid = $veri->request->get('resimid');
        $aracid = $veri->request->get('aracid');

        $qb=$em->createQueryBuilder();
        $q = $qb->update('PanelBundle:Resim', 'r')
            ->set('r.ana', ':ana')
            ->where('r.arac = '.$aracid)
            ->setParameter('ana', 0)
            ->getQuery()
            ->execute();

        $qb=$em->createQueryBuilder();
        $q = $qb->update('PanelBundle:Resim', 'r')
            ->set('r.ana', ':ana')
            ->where('r.id = '.$resimid)
            ->setParameter('ana', 1)
            ->getQuery()
            ->execute();

            return new Response('');
    }

    public function resim_siralaAction(Request $veri){
        $em = $this->getDoctrine()->getManager();
        $listItem = $veri->request->get('listItem');

        foreach ($listItem as $sira=>$id){

            $qb=$em->createQueryBuilder();
            $q = $qb->update('PanelBundle:Resim', 'r')
                ->set('r.sira', ':sira')
                ->where('r.id = '.$id)
                ->setParameter('sira', $sira)
                ->getQuery()
                ->execute();

        }

        return new Response('');
    }

    public function kayit_bitirAction(Request $veri){
        $em = $this->getDoctrine()->getManager();
        $aracid = $this->get('session')->get('aracid');

        $qb = $em->createQueryBuilder();
        $resimler=$qb->select('count(r.id) as sayi')
            ->from('PanelBundle:Resim', 'r')
            ->join('r.arac','a')
            ->where('a.id='.$aracid)
            ->getQuery()
            ->getScalarResult();

        if($resimler[0]['sayi']==0) {
            return new Response('1');
        }else{
            $qb = $em->createQueryBuilder();
            $q = $qb->update('PanelBundle:Arac', 'a')
                ->set('a.durum', ':durum')
                ->where('a.id = ' . $aracid)
                ->setParameter('durum', 1)
                ->getQuery()
                ->execute();

            return new Response('');
        }


    }

    public function duzenleAction($id, Request $veri)
    {
        $em = $this->getDoctrine()->getManager();
        $this->get('session')->set('aracid',$id);
        $qb = $em->createQueryBuilder();
        $arac=$qb->select('o.id as ofisid,ag.id as aracgrupid,a.id,a.marka,a.model,a.motorHacmi,a.paket,a.yil,a.listeFiyat,a.onlineRezervasyonFiyat,a.indirim1,a.indirim1tip,a.indirim2,a.indirim2tip,a.indirim3,a.indirim3tip,a.indirim4,a.indirim4tip,a.indirim5,a.indirim5tip,a.yetiskinSayisi,a.buyukBavul,a.kucukBavul,a.yasSiniri,a.yakitTipi,a.airbag,a.vitesTuru,a.abs,a.kmSiniri,a.kkBlokeTutar,a.ehliyetYasi,a.renk,a.kasaTipi,a.klima,a.plaka')
            ->from('PanelBundle:Arac', 'a')
            ->join('a.ofis','o')
            ->join('a.aracGrup','ag')
            ->where('a.id='.$id)
            ->getQuery()
            ->getScalarResult();

        $qb = $em->createQueryBuilder();
        $ofisler=$qb->select('o.adi,o.id')
            ->from('PanelBundle:Ofis', 'o')
            ->getQuery()
            ->getScalarResult();

        $qb = $em->createQueryBuilder();
        $aracGruplari=$qb->select('ag.adi,ag.id')
            ->from('PanelBundle:AracGrup', 'ag')
            ->getQuery()
            ->getScalarResult();

        if($arac[0]['id']=='') {
            $durum = 0;
        }else{
            $durum = 1;
            }

        return $this->render('@Panel/Arac/duzenle.html.twig',array('ofisler'=>$ofisler,'aracGruplari'=>$aracGruplari,'arac'=>$arac[0],'durum'=>$durum));
    }

    public function kaldirAction(Request $veri){
        $em = $this->getDoctrine()->getManager();
        $aracid = $this->get('session')->get('aracid');

        $qb=$em->createQueryBuilder();
        $qb->delete('PanelBundle:Arac', 'a')
            ->where('a.id='.$aracid)
            ->getQuery()
            ->execute();
        return new Response('');
    }

}
