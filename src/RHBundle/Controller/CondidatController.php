<?php

namespace RHBundle\Controller;

use RHBundle\Entity\Condidat;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Condidat controller.
 *
 * @Route("condidat")
 */
class CondidatController extends Controller
{
    /**
     * Lists all condidat entities.
     *
     * @Route("/", name="condidat_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $condidats = $em->getRepository('RHBundle:Condidat')->findAll();

        return $this->render('condidat/index.html.twig', array(
            'condidats' => $condidats,
        ));
    }

    /**
     * Creates a new condidat entity.
     *
     * @Route("/new", name="condidat_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $condidat = new Condidat();
        $form = $this->createForm('RHBundle\Form\CondidatType', $condidat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($condidat);
            $em->flush();

            return $this->redirectToRoute('condidat_new');
        }

        return $this->render('condidat/new.html.twig', array(
            'condidat' => $condidat,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a condidat entity.
     *
     * @Route("/{id}", name="condidat_show")
     * @Method("GET")
     */
    public function showAction(Condidat $condidat)
    {
        $deleteForm = $this->createDeleteForm($condidat);

        return $this->render('condidat/show.html.twig', array(
            'condidat' => $condidat,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing condidat entity.
     *
     * @Route("/{id}/edit", name="condidat_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Condidat $condidat)
    {
        $deleteForm = $this->createDeleteForm($condidat);
        $editForm = $this->createForm('RHBundle\Form\CondidatType', $condidat);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('condidat_edit', array('id' => $condidat->getCin()));
        }

        return $this->render('condidat/edit.html.twig', array(
            'condidat' => $condidat,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a condidat entity.
     *
     * @Route("/{id}", name="condidat_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Condidat $condidat)
    {
        $form = $this->createDeleteForm($condidat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($condidat);
            $em->flush();
        }

        return $this->redirectToRoute('condidat_index');
    }

    /**
     * Creates a form to delete a condidat entity.
     *
     * @param Condidat $condidat The condidat entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Condidat $condidat)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('condidat_delete', array('id' => $condidat->getCin())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
