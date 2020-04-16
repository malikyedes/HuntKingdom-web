<?php

namespace HuntkingdomBundle\Controller;

use ForumBundle\Entity\Commentaire;
use ForumBundle\Entity\Publication;
use http\Client\Curl\User;
use HuntkingdomBundle\Entity\Reclam;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function datadashboardAction()
    {

        $em = $this->getDoctrine()->getManager();

        /*---------------------------------------------Espece Bundle---------------------------------------------*/

        /*---------------------------espece---------------------------*/


        /*---------------------------saison---------------------------*/


        /*---------------------------------------------Evenement Bundle---------------------------------------------*/

        /*---------------------------Comments---------------------------*/


        /*---------------------------Evenement---------------------------*/


        /*---------------------------Inscription---------------------------*/



        /*---------------------------------------------Forum Bundle---------------------------------------------*/

        /*---------------------------commentaire---------------------------*/

        $commentaire = $em->getRepository(Commentaire::class)->findAll();
        $countCommentaire = count($commentaire);

        /*---------------------------publication---------------------------*/

        $publication = $em->getRepository(Publication::class)->findAll();
        $countPublication = count($publication);

        /*---------------------------------------------Main Bundle---------------------------------------------*/

        /*---------------------------commentaire---------------------------*/
        $user = $em->getRepository(\ForumBundle\Entity\User::class)->findAll();
        $countUser = count($user);
        /*---------------------------------------------Produit Bundle---------------------------------------------*/

        /*---------------------------Produit---------------------------*/


        /*---------------------------Categorie---------------------------*/


        /*---------------------------Promotion---------------------------*/


        /*---------------------------Rating---------------------------*/


        /*---------------------------Wishlist---------------------------*/



        /*---------------------------------------------Reclamation Bundle---------------------------------------------*/

        /*---------------------------Reclamation---------------------------*/

        $reclamation = $em->getRepository(Reclam::class)->findAll();
        $countReclamation = count($reclamation);


        /*---------------------------------------------Ecommerce Bundle---------------------------------------------*/

        /*---------------------------Commande---------------------------*/




        /* -------------------RENDERING-----------------------*/


        return $this->render('@Huntkingdom/Default/datadashboard.html.twig', array(

            'countCommentaire' => $countCommentaire,
            'countPublication' => $countPublication,
            'countReclamation' => $countReclamation,


            'countUser' => $countUser,

            'commentaire' => $commentaire,
            'publication' => $publication,

            'reclamation' => $reclamation,

            'user' => $user,

        ));
    }

}
