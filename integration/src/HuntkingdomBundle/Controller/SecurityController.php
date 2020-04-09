<?php

namespace HuntkingdomBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class SecurityController extends Controller
{
    /**
     * @Route("/add")
     */
    public function addAction()
    {
        return $this->render('HuntkingdomBundle:Security:admin_home.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/index")
     */
    public function redirectAction()
    {
        $authChecker=$this-> container->get('security.authorization_checker');
        if ($authChecker->$this->isGranted('ROLE_USER')) {
            return $this->render('@Huntkingdom/Default/index.html.twig');

        }
else{
        return $this->render('@Huntkingdom/Security/user_home.html.twig');}
    }

}
