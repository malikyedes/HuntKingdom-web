<?php

namespace HuntkingdomBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class SecurityControllerController extends Controller
{
    /**
     * @Route("/add")
     */
    public function addAction()
    {
        return $this->render('HuntkingdomBundle:SecurityController:add.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/index")
     */
    public function redirectAction()
    {
        $authchecker=$this->container->get('security.authorization_checker');
        if ($authchecker-$this->isGranted('ROLE_USER')){
            return $this->render('@Huntkingdom/Default/index.html.twig');

        }
        else {
            return $this->render('@FOSUSER/Security/login.html.twig');
        }

    }

}
