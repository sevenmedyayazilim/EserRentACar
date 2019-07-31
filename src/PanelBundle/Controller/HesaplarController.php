<?php

namespace PanelBundle\Controller;

use PanelBundle\Entity\Ofis;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class HesaplarController extends Controller
{
    public function indexAction()
    {
        return $this->render('@Panel/Hesaplar/index.html.twig');
    }
    public function getirAction()
    {
        $em = $this->getDoctrine()->getManager();

        $qb = $em->createQueryBuilder();
        $hesaplar=$qb->select('u.username,u.adi,u.soyadi,u.email,u.telefon,u.unvan,u.id')
            ->from('PanelBundle:User', 'u')
            ->where("u.roles LIKE '%ROLE_PERSONEL%'")
            ->getQuery()
            ->getScalarResult();

        return $this->render('@Panel/Hesaplar/getir.html.twig',array('hesaplar'=>$hesaplar));
    }
    public function ekleAction(Request $veri){
        $em = $this->getDoctrine()->getManager();

        $kullaniciadi=$veri->request->get('kullaniciadi');
        $adi=$veri->request->get('adi');
        $soyadi=$veri->request->get('soyadi');
        $eposta=$veri->request->get('eposta');
        $telefon=$veri->request->get('telefon');
        $unvan=$veri->request->get('unvan');


        $qb = $em->createQueryBuilder();
        $kullaniciUsername=$qb->select('count(u.id) as sayi')
            ->from('PanelBundle:User', 'u')
            ->where("u.username = '".$kullaniciadi."'")
            ->getQuery()
            ->getScalarResult();
        if ($kullaniciUsername[0]['sayi']!=0){
            return new Response('Kullanıcı adı kullanılmaktadır.');
        }

        $qb = $em->createQueryBuilder();
        $kullaniciEmail=$qb->select('count(u.id) as sayi')
            ->from('PanelBundle:User', 'u')
            ->where("u.email = '".$eposta."'")
            ->getQuery()
            ->getScalarResult();
        if ($kullaniciEmail[0]['sayi']!=0){
            return new Response('E-Posta adresi kullanılmaktadır.');
        }
        $pass = rand(100000,999999);
        $userManager = $this->get('fos_user.user_manager');
        $user = $userManager->createUser();

        $user->setAdi($adi);
        $user->setSoyadi($soyadi);
        $user->setTelefon($telefon);
        $user->setUnvan($unvan);
        $user->setUsername($kullaniciadi);
        $user->setEmail($eposta);
        $user->setPlainPassword($pass);
        $user->setEnabled(true);
        $user->setRoles(array("ROLE_PERSONEL"));
        $userManager->updateUser($user);
        $em->persist($user);


        $message = \Swift_Message::newInstance()
            ->setSubject('Üyeliğiniz aktif edildi.')
            ->setFrom(array('bilgilendirme@sevenmedya.com'=>'Seven Car Rental'))
            ->setTo(array($eposta=>$adi.' '.$soyadi))
            ->setBody($this->renderView('@Panel/Hesaplar/yenikullanici_mail.html.twig', array('kullaniciadi' => $kullaniciadi,'adi' => $adi,'soyadi'=>$soyadi,'pass'=>$pass,'konu'=>'Üyeliğiniz aktif edildi.')), 'text/html');
        $this->get('mailer')->send($message);



        $em->flush();

        return new Response('');
    }
    public function duzenleAcAction(Request $veri)
    {
        $em = $this->getDoctrine()->getManager();
        $id=$veri->request->get('id');

        $qb = $em->createQueryBuilder();
        $hesap=$qb->select('u.username,u.adi,u.soyadi,u.email,u.telefon,u.unvan,u.id')
            ->from('PanelBundle:User', 'u')
            ->where('u.id='.$id)
            ->getQuery()
            ->getScalarResult();

        return $this->render('@Panel/Hesaplar/duzenleAc.html.twig',array('hesap'=>$hesap[0]));
    }
    public function duzenleAction(Request $veri){
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
            ->set('u.telefon', ':telefon')
            ->set('u.unvan', ':unvan')
            ->where('u.id = '.$id)
            ->setParameter('username', $kullaniciadi)
            ->setParameter('adi', $adi)
            ->setParameter('soyadi', $soyadi)
            ->setParameter('email', $eposta)
            ->setParameter('telefon', $telefon)
            ->setParameter('unvan', $unvan)
            ->getQuery()
            ->execute();

        return new Response('');
    }
    public function silAction(Request $veri){
        $em = $this->getDoctrine()->getManager();

        $id=$veri->request->get('id');

        $qb=$em->createQueryBuilder();
        $qb->delete('PanelBundle:User', 'u')
            ->where('u.id='.$id)
            ->getQuery()
            ->execute();

        return new Response('');
    }

    public function sifreDegistirAction(Request $veri)
    {
        $em = $this->getDoctrine()->getManager();

        $sifre = $veri->request->get('sifre');
        $id = $veri->request->get('id');

        $qb = $em->createQueryBuilder();
        $hesap=$qb->select('u.adi,u.soyadi,u.email,u.username')
            ->from('PanelBundle:User', 'u')
            ->where('u.id='.$id)
            ->getQuery()
            ->getScalarResult();

        $encoder_service = $this->get('security.encoder_factory');
        $encoder = $encoder_service->getEncoder($this->getUser());
        $new_pwd_encoded = $encoder->encodePassword($sifre, $this->getUser()->getSalt());


        $qb=$em->createQueryBuilder();
        $q = $qb->update('PanelBundle:User', 'u')
            ->set('u.password', ':password')
            ->where('u.id = '.$id)
            ->setParameter('password', $new_pwd_encoded)
            ->getQuery()
            ->execute();

        $message = \Swift_Message::newInstance()
            ->setSubject('Şifreniz değiştirildi.')
            ->setFrom(array('bilgilendirme@sevenmedya.com'=>'Seven Car Rental'))
            ->setTo(array($hesap[0]['email']=>$hesap[0]['adi'].' '.$hesap[0]['soyadi']))
            ->setBody($this->renderView('@Panel/Hesaplar/sifreDegistir_mail.html.twig', array('kullaniciadi' => $hesap[0]['username'],'adi' => $hesap[0]['adi'],'soyadi'=>$hesap[0]['soyadi'],'pass'=>$sifre,'konu'=>'Şifreniz değiştirildi.')), 'text/html');
        $this->get('mailer')->send($message);



        return new Response('');

    }


}
