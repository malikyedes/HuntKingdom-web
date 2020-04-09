<?php

namespace HuntkingdomBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HuntController extends Controller
{
    public function loginAction()
    {
        return $this->render('@Huntkingdom/Default/login.html.twig');
    }
    public function indexAction()
    {
        return $this->render('@Huntkingdom/Default/index.html.twig');
    }
    public function signupAction()
    {
        return $this->render('@Huntkingdom/Default/signup.html.twig');
    }
}

