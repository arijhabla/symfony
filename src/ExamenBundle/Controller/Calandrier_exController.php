<?php

namespace ExamenBundle\Controller;

use ExamenBundle\Entity\Calandrier_ex;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Calandrier_ex controller.
 *
 * @Route("calandrier_ex")
 */
class Calandrier_exController extends Controller
{
    /**
     * Lists all calandrier_ex entities.
     *
     * @Route("/", name="calandrier_ex_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $calandrier_exes = $em->getRepository('ExamenBundle:Calandrier_ex')->findAll();

        return $this->render('calandrier_ex/index.html.twig', array(
            'calandrier_exes' => $calandrier_exes,
        ));
    }



    /**
     * Lists all calandrier_ex entities.
     *
     * @Route("/front", name="calandrier_ex_front")
     * @Method("GET")
     */
    public function frontAction()
    {
        $em = $this->getDoctrine()->getManager();

        $calandrier_exes = $em->getRepository('ExamenBundle:Calandrier_ex')->findAll();

        return $this->render('calandrier_ex/front.html.twig', array(
            'calandrier_exes' => $calandrier_exes,
        ));
    }

    /**
     * Creates a new calandrier_ex entity.
     *
     * @Route("/front", name="calandrier_ex_searsh")
     * @Method({"GET", "POST"})
     */
    public function searchAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();

        $reparateurs = $em->getRepository('ExamenBundle:Calandrier_ex')->findAll();

        if($request->isMethod("POST"))
        {
            $etat = $request->get('status');
            $reparateurs = $em->getRepository('ExamenBundle:Calandrier_ex')->findBy(array('cln'=>$etat));
        }
        return $this->render('calandrier_ex/front.html.twig', array(
            'calandrier_exes' => $reparateurs,
        ));
    }

    /**
     * Creates a new calandrier_ex entity.
     *
     * @Route("/new", name="calandrier_ex_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $calandrier_ex = new Calandrier_ex();
        $form = $this->createForm('ExamenBundle\Form\Calandrier_exType', $calandrier_ex);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $pp=$calandrier_ex->getIdMatiere()->getNomMatiere();
            $calandrier_ex->setCln($pp);
            $em = $this->getDoctrine()->getManager();

            $em->persist($calandrier_ex);
            $em->flush();

            return $this->redirectToRoute('calandrier_ex_show', array('id' => $calandrier_ex->getId()));
        }

        return $this->render('calandrier_ex/new.html.twig', array(
            'calandrier_ex' => $calandrier_ex,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a calandrier_ex entity.
     *
     * @Route("/{id}", name="calandrier_ex_show")
     * @Method("GET")
     */
    public function showAction(Calandrier_ex $calandrier_ex)
    {
        $deleteForm = $this->createDeleteForm($calandrier_ex);

        return $this->render('calandrier_ex/show.html.twig', array(
            'calandrier_ex' => $calandrier_ex,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing calandrier_ex entity.
     *
     * @Route("/{id}/edit", name="calandrier_ex_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Calandrier_ex $calandrier_ex)
    {
        $deleteForm = $this->createDeleteForm($calandrier_ex);
        $editForm = $this->createForm('ExamenBundle\Form\Calandrier_exType', $calandrier_ex);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('calandrier_ex_edit', array('id' => $calandrier_ex->getId()));
        }

        return $this->render('calandrier_ex/edit.html.twig', array(
            'calandrier_ex' => $calandrier_ex,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a calandrier_ex entity.
     *
     * @Route("/{id}", name="calandrier_ex_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Calandrier_ex $calandrier_ex)
    {
        $form = $this->createDeleteForm($calandrier_ex);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($calandrier_ex);
            $em->flush();
        }

        return $this->redirectToRoute('calandrier_ex_index');
    }

    /**
     * Creates a form to delete a calandrier_ex entity.
     *
     * @param Calandrier_ex $calandrier_ex The calandrier_ex entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Calandrier_ex $calandrier_ex)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('calandrier_ex_delete', array('id' => $calandrier_ex->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

    /**
     * Lists all calandrier_ex entities.
     *
     * @Route("/do/export", name="calandrier_ex_export")
     * @Method("GET")
     */

    public function exportAction()
    {
        $em = $this->getDoctrine()->getManager();
        $calandrier_exes = $em->getRepository('ExamenBundle:Calandrier_ex')->findAll();

        $writer = $this->container->get('egyg33k.csv.writer');
        $csv = $writer::createFromFileObject(new \SplTempFileObject());

        $csv->insertOne(['id','id_examen','Matiere','Classe','Salle' ,'date_ex']);

        foreach ($calandrier_exes as $calandrier_ex)
        {
            $csv->insertOne([$calandrier_ex->getId(),$calandrier_ex->getIdExamen()->getId(), $calandrier_ex->getIdMatiere()->getNomMatiere(),$calandrier_ex->getIdClasse()->getNiveau(),$calandrier_ex->getIdSalle()->getId(),$calandrier_ex->getDateEx()->format('Y-m-d')]);
        }
        $csv->output('calender.csv');
        die('calandrier_ex_export');
    }
}
