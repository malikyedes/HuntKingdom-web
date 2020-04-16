<?php

namespace HuntkingdomBundle\Controller;

use HuntkingdomBundle\Entity\Evenements;
use HuntkingdomBundle\Form\EvenementsType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class EvenementsController extends Controller
{
    public function AjoutEvenementsAction(Request $request)
    {
        $Evenement = new Evenements();
        $form = $this->createForm(EvenementsType::class, $Evenement);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $em = $this->getDoctrine()->getManager();
            $Evenement->uploadFile();
            $Evenement->setImage($Evenement->getFile());
            $em->persist($Evenement);
            $em->flush();
            return $this->redirectToRoute('huntkingdom_AfficheEvenements');

        }

        return $this->render("@Huntkingdom/Evenements/AjoutEvenements.html.twig", array('form' => $form->createView()));

    }

    public function AfficheEvenementsAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $Evenement = $em->getRepository("HuntkingdomBundle:Evenements")->findAll();

        /**
         * @var $paginator \knp\Component\Pager\Paginator
         */
        $paginator = $this->get('knp_paginator');
        $result = $paginator->paginate(
            $Evenement,
            $request->query->getInt('page', 1),
            $request->query->getInt('page', 5)
        );
        //dump(get_class($paginator));
        return $this->render("@Huntkingdom/Evenements/AfficheTest.html.twig", ['Evenement' => $result]);
         //return $this->render("@Huntkingdom/Evenements/AfficheTest.html.twig",array('Evenement'=>$Evenement));

    }

    public function SupprimerEvenementsAction(Request $request, $id)
    {
        $Evenement = new Evenements();
        $em = $this->getDoctrine()->getManager();
        $Evenement = $em->getRepository("HuntkingdomBundle:Evenements")->find($id);
        $em->remove($Evenement);
        $em->flush();
        return $this->redirectToRoute('huntkingdom_AfficheEvenements');

    }

    public function ModifierEvenementsAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $Evenement = $em->getRepository("HuntkingdomBundle:Evenements")->find($id);
        $form = $this->createForm(EvenementsType::class, $Evenement);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $em->persist($Evenement);
            $em->flush();
            return $this->redirectToRoute('huntkingdom_AfficheEvenements');

        }
        return $this->render("@Huntkingdom/Evenements/AjoutEvenements.html.twig", array('form' => $form->createView()));
    }

    public function showAction($id, Request $request)
    {

        if ($this->container->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
            $user = $this->container->get('security.token_storage')->getToken()->getUser();
            $userid = $user->getId();
        }
        $eme3 = $this->getDoctrine()->getManager();
        //$Views= $eme3->getRepository("ForumBundle:Vus")->countViews($id);

        $em = $this->getDoctrine()->getManager();
        $Evenement = $em->getRepository("HuntkingdomBundle:Evenements")->find($id);

        $em1 = $this->getDoctrine()->getManager();

        return $this->render('@Huntkingdom/Evenements/show.html.twig', array('Evenement' => $Evenement));
    }


}
