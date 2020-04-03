<?php
namespace ForumBundle\Controller;
use ForumBundle\Entity\Commentaire;
use ForumBundle\Entity\LikeF;
use ForumBundle\Entity\LikeForum;
use ForumBundle\Entity\Publication;
use ForumBundle\Entity\Vus;
use ForumBundle\Form\PublicationType;
use ForumBundle\ForumBundle;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class PublicationController extends Controller {
    public function readAction()
    {
        $em=$this->getDoctrine()->getManager();
        $Publication=$em->getRepository("ForumBundle:Publication")->findAll();

        return $this->render('@Forum/publication/readtest.html.twig',array('m'=>$Publication));
    }

    public function searchAction(Request $request)
    {
        $m=new Publication();
        $Form=$this->createForm(\ForumBundle\Form\RechercheType::class,$m);
        $Form->handleRequest($request);

        if($Form->isSubmitted())
        {
            $m=$this->getDoctrine()->getRepository(Publication::class)
                ->findBy(array('titre'=>$m->getTitre()));;


        }
        else{
            $m=$this->getDoctrine()->getRepository(Publication::class)
                ->findAll();
        }
        return $this->render("@Forum/publication/recherche.html.twig",array('f'=>$Form->createView(),'m'=>$m));


    }

    public function showAction($id,Request $request)
    {
        if( $this->container->get( 'security.authorization_checker' )->isGranted( 'IS_AUTHENTICATED_FULLY' ) )
         {
             $user = $this->container->get('security.token_storage')->getToken()->getUser();
             $userid = $user->getId();
         }
        $eme3=$this->getDoctrine()->getManager();
        $Views= $eme3->getRepository("ForumBundle:Vus")->countViews($id);

        $em=$this->getDoctrine()->getManager();
        $Pub=$em->getRepository("ForumBundle:Publication")->find($id);

        $em1=$this->getDoctrine()->getManager();
        $commentairep=$em1->getRepository("ForumBundle:Commentaire")->findCommentSQD_Forum($id);
        $eme3=$this->getDoctrine()->getManager();
        $Viewsd=$eme3->getRepository("ForumBundle:Vus")->countViewUser($id,$userid);
        if ($Viewsd[1]==0)
        { $this->add_viewAction($id);}


        return $this->render('@Forum/publication/show.html.twig',array('m'=>$Pub,'msg'=>$commentairep,'views'=>$Views));




    }



    public function ajouterAction(Request $request)
    {
        $Publication=new Publication();
        $time = new \DateTime();

        /* if( $this->container->get( 'security.authorization_checker' )->isGranted( 'IS_AUTHENTICATED_FULLY' ) )
         {
             $user = $this->container->get('security.token_storage')->getToken()->getUser();
             $userid = $user->getId();
         }*/

        // $Publication->setIdUser($userid);
        $Publication->setPostedIn($time);

        $Form=$this->createForm(PublicationType::class,$Publication);
        $Form->handleRequest($request);
        if($Form->isValid())
        {
            $em=$this->getDoctrine()->getManager();

            $Publication->uploadFile();
            $Publication->setImage($Publication->getFile());

            $em->persist($Publication);
            $em->flush();

            return $this->redirectToRoute('forum_read');

        }

        return $this->render("@Forum/publication/ajout.html.twig",array(

            'f'=>$Form->createView()
        ));

    }

    public function deleteAction($id)
    {
        $em=$this->getDoctrine()->getManager();
        $Publication=$em->getRepository(Publication::class)->find($id);
        $em->remove($Publication);
        $em->flush();
        return $this->redirectToRoute('forum_read');

    }


    public function updateAction($id , Request $request)
    {
        $em=$this->getDoctrine()->getManager();
        $mo=$em->getRepository('ForumBundle:Publication')->find($id);

        $Form=$this->createForm(PublicationType::class,$mo);
        $Form->handleRequest($request);

        if($Form->isValid()){

            $mo->uploadFile();
            $mo->setImage($mo->getFile());

            $em->persist($mo);
            $em->flush();
            return $this->redirectToRoute('article_afficher');
        }
        return $this->render('@Forum/publication/update.html.twig',array('f'=>$Form->createView()));




    }

    public function add_viewAction($id )
    {
        $view = new Vus();
        if ($this->container->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
            $user = $this->container->get('security.token_storage')->getToken()->getUser();
            $userid = $user->getId();
        }
        $time = new \DateTime();
        $view->setIdPb($id);
        $view->setIdUsers($userid);

        $em = $this->getDoctrine()->getManager();
        $em->persist($view);
        $em->flush();


        return true;


    }

    public function add_likeAction($id , Request $request)
    {
        $like = new LikeForum();
        $eme=$this->getDoctrine()->getManager();
        $likes=$eme->getRepository("ForumBundle:LikeForum")->countLike($id);


        if ($this->container->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
            $user = $this->container->get('security.token_storage')->getToken()->getUser();
            $userid = $user->getId();
        }
        $like->setIdpb($id);
        $like->setIdUsers($userid);
        $em = $this->getDoctrine()->getManager();
        $em->persist($like);
        $em->flush();

        $arrData = ['output' => $likes[1]+1];
        return new JsonResponse($arrData);


    }


    public function add_dislikeAction($id )
    {
        if ($this->container->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
            $user = $this->container->get('security.token_storage')->getToken()->getUser();
            $userid = $user->getId();
        }


        $eme=$this->getDoctrine()->getManager();
        $likes=$eme->getRepository("ForumBundle:LikeForum")->countLike($id);


        $em=$this->getDoctrine()->getManager();
        $like=$em->getRepository("ForumBundle:LikeForum")->findOneBy(array('idUser' =>$userid,'idpb' => $id));


        $em->remove($like);
        $em->flush();

        $arrData = ['output' => $likes[1]-1];
        return new JsonResponse($arrData);


    }
    public function ajouter_commentaireAction(Request $request)
    {

    $id_page=$request->request->get('id');
        $em=$this->getDoctrine()->getManager();
        $id= $request->get('id');
        $comm=$request->get('comm');
        $publication=$em->getRepository("ForumBundle:Commentaire")->find($id);
        // $messegp=$em1->getRepository("ForumBundle:Commentaire")->findCommentSQD_Forum($id);
        $em1=$this->getDoctrine()->getManager();
        $commentairep=$em1->getRepository("ForumBundle:Commentaire")->findCommentSQD_Forum($id);

        $messeg=new Commentaire();
        $time = new \DateTime();
        if($request->isMethod('post')) {
            $messeg->setAddedIn($time);

            $messeg->setAddedIn($time);
            $messeg->setIdPb($id);
            $messeg->setContenu($comm);
            $em = $this->getDoctrine()->getManager();
            $em->persist($messeg);
            $em->flush();
        return $this->redirect("../show/$id_page");

        }

        return $this->redirect("../show/$id_page");

    }



















    /*  public function ajouter_commentaireAction(Request $request,$id)
      {



          //$membres= $this->getDoctrine()->getManager()->getRepository('AppBundle:Membre')->findAll();


          $em=$this->getDoctrine()->getManager();
          $pub=$em->getRepository("ForumBundle:Publication")->find($id);
          $em1=$this->getDoctrine()->getManager();
          $commentairep=$em1->getRepository("ForumBundle:Publication")->findCommentSQD_Forum($id);

          $msg=new Commentaire();
          $time = new \DateTime();
          if( $this->container->get( 'security.authorization_checker' )->isGranted( 'IS_AUTHENTICATED_FULLY' ) )
          {
              $user = $this->container->get('security.token_storage')->getToken()->getUser();
              $userid = $user->getId();
          }

          $em11=$this->getDoctrine()->getManager();
          //$likes=$em11->getRepository("ForumBundle:LikeForum")->countLike($id);
          $em111=$this->getDoctrine()->getManager();
          //$likes_user=$em111->getRepository("ForumBundle:LikeF")->countLikeUser($id,$userid);



          //$commentaire->setIdUsers(5);
          //$commentaire->setAddedIn($time);

          if($request->isMethod('POST')) {
          //$commentaire->setIdUsers(5);
          $msg->setAddedIn($time);
          $msg->setIdPb($id);
          //$commentaire->setVote(0);//
          $msg->setContenu($request->get('comment'));
          $em = $this->getDoctrine()->getManager();
          $em->persist($msg);
          $em->flush();
          return $this->redirectToRoute('forum_ajouter_comment', array('m' => $pub, 'msg' => $commentairep, 'id' => $id
          ));


      }
          return $this->render('@Forum/forum/show.html.twig',array('m'=>$pub,'msg'=>$commentairep,'id' => $id,//'likes' => $likes,'likes_user' => $likes_user, //
           //   'membres'=>$membres//
          ));

      }
  */


}

