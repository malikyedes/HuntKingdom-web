<?php

namespace HuntkingdomBundle\Controller;

use HuntkingdomBundle\Entity\Reclam;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;

/**
 * Reclam controller.
 *
 * @Route("reclam")
 */
class ReclamController extends Controller
{
    /**
     * Lists all reclam entities.
     *
     * @Route("/", name="reclam_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $reclams = $em->getRepository('HuntkingdomBundle:Reclam')->findAll();

        return $this->render('reclam/index.html.twig', array('reclams' => $reclams));
    }

    /**
     * Creates a new reclam entity.
     *
     * @Route("/new", name="reclam_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $reclam = new Reclam();
        $form = $this->createForm('HuntkingdomBundle\Form\ReclamType', $reclam);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /**
             * @var UploadedFile $file
             */
            $file=$reclam->getScreenshot();

            $fileName = md5(uniqid()).'.'.$file->getExtension();
            $file->move($this->getParameter('image_directory'),$fileName);
            $reclam->setScreenshot($fileName);
            $em = $this->getDoctrine()->getManager();
            $em->persist($reclam);
            $em->flush();

            return $this->redirectToRoute('reclam_show', array('id' => $reclam->getId()));
        }

        return $this->render('reclam/new.html.twig', array(
            'reclam' => $reclam,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a reclam entity.
     *
     * @Route("/{id}", name="reclam_show")
     * @Method("GET")
     */
    public function showAction(Reclam $reclam)
    {
        $deleteForm = $this->createDeleteForm($reclam);

        return $this->render('reclam/show.html.twig', array(
            'reclam' => $reclam,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing reclam entity.
     *
     * @Route("/{id}/edit", name="reclam_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Reclam $reclam)
    {
        $deleteForm = $this->createDeleteForm($reclam);
        $editForm = $this->createForm('HuntkingdomBundle\Form\ReclamType', $reclam);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('reclam_edit', array('id' => $reclam->getId()));
        }

        return $this->render('reclam/edit.html.twig', array(
            'reclam' => $reclam,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a reclam entity.
     *
     * @Route("reclam/{id}", name="reclam_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Reclam $reclam)
    {
        $form = $this->createDeleteForm($reclam);

        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->remove($reclam);
            $em->flush();
        }

        return $this->redirectToRoute('reclam_index');
    }

    /**
     * Creates a form to delete a reclam entity.
     *
     * @param Reclam $reclam The reclam entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Reclam $reclam)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('reclam_delete', array('id' => $reclam->getId())))
            ->setMethod('DELETE')
            ->getForm()

        ;
        $img=$reclam->setScreenshot();
        $path=$this->getParameter('image_directory').'/'.$img;
        $fs= new Filesystem();
        $fs->remove(array($path));
    }
}
