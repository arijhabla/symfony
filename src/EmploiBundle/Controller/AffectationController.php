<?php

namespace EmploiBundle\Controller;

use EmploiBundle\Entity\Affectation;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Affectation controller.
 *
 * @Route("affectation")
 */
class AffectationController extends Controller
{
    /**
     * Lists all affectation entities.
     *
     * @Route("/", name="affectation_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $affectations = $em->getRepository('EmploiBundle:Affectation')->findAll();

        return $this->render('affectation/index.html.twig', array(
            'affectations' => $affectations,
        ));
    }

    /**
     * Lists all affectation entities.
     *
     * @Route("/front", name="affectation_front")
     * @Method("GET")
     */
    public function frontAction()
    {
        $em = $this->getDoctrine()->getManager();

        $affectations = $em->getRepository('EmploiBundle:Affectation')->findAll();

        return $this->render('affectation/front.html.twig', array(
            'affectations' => $affectations,
        ));
    }

    /**
     * Creates a new affectation entity.
     *
     * @Route("/front", name="affectation_searsh")
     * @Method({"GET", "POST"})
     */
    public function searchAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();

        $reparateurs = $em->getRepository('EmploiBundle:Affectation')->findAll();

        if($request->isMethod("POST"))
        {
            $etat = $request->get('status');
            $reparateurs = $em->getRepository('EmploiBundle:Affectation')->findBy(array('cln'=>$etat));
        }
        return $this->render('Affectation/front.html.twig', array(
            'affectations' => $reparateurs,
        ));
    }


    /**
     * Creates a new affectation entity.
     *
     * @Route("/new", name="affectation_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $affectation = new Affectation();
        $form = $this->createForm('EmploiBundle\Form\AffectationType', $affectation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $pp=$affectation->getNomClasse()->getNiveau();
            $affectation->setCln($pp);
            $em = $this->getDoctrine()->getManager();
            $em->persist($affectation);
            $em->flush();

            return $this->redirectToRoute('affectation_show', array('id' => $affectation->getId()));
        }

        return $this->render('affectation/new.html.twig', array(
            'affectation' => $affectation,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a affectation entity.
     *
     * @Route("/{id}", name="affectation_show")
     * @Method("GET")
     */
    public function showAction(Affectation $affectation)
    {
        $deleteForm = $this->createDeleteForm($affectation);

        return $this->render('affectation/show.html.twig', array(
            'affectation' => $affectation,
            'delete_form' => $deleteForm->createView(),
        ));
    }



    /**
     * Displays a form to edit an existing affectation entity.
     *
     * @Route("/{id}/edit", name="affectation_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Affectation $affectation)
    {
        $deleteForm = $this->createDeleteForm($affectation);
        $editForm = $this->createForm('EmploiBundle\Form\AffectationType', $affectation);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('affectation_edit', array('id' => $affectation->getId()));
        }

        return $this->render('affectation/edit.html.twig', array(
            'affectation' => $affectation,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a affectation entity.
     *
     * @Route("/{id}", name="affectation_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Affectation $affectation)
    {
        $form = $this->createDeleteForm($affectation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($affectation);
            $em->flush();
        }

        return $this->redirectToRoute('affectation_index');
    }

    /**
     * Creates a form to delete a affectation entity.
     *
     * @param Affectation $affectation The affectation entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Affectation $affectation)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('affectation_delete', array('id' => $affectation->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

    /**
     * Lists all affectation entities.
     *
     * @Route("/Do/pdf", name="affectation_pdf")
     * @Method({"GET", "POST"})
     */
    public function pdfAction()
    {
        $em = $this->getDoctrine()->getManager();

        $affectations = $em->getRepository('EmploiBundle:Affectation')->findAll();
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < 10; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        $this->get('knp_snappy.pdf')->generateFromHtml(
            $this->renderView(
                'affectation/pdf.html.twig',
                array(
                    'affectations'  => $affectations
                )
            ),
            'C:/pdf/'.$randomString.'.pdf'
        );
        die('télécharger avec succès');
    }
}
