<?php

namespace RHBundle\Controller;

use RHBundle\Entity\Reunion;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Reunion controller.
 *
 * @Route("reunion")
 */
class ReunionController extends Controller
{
    /**
     * Lists all reunion entities.
     *
     * @Route("/", name="reunion_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $reunions = $em->getRepository('RHBundle:Reunion')->findAll();

        return $this->render('reunion/index.html.twig', array(
            'reunions' => $reunions,
        ));
    }

    /**
     * Creates a new reunion entity.
     *
     * @Route("/new", name="reunion_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $reunion = new Reunion();
        $form = $this->createForm('RHBundle\Form\ReunionType', $reunion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $pp=$reunion->getIdEnseignant()->getId();
            $reunion->setIde($pp);
            $em = $this->getDoctrine()->getManager();
            $em->persist($reunion);
            $em->flush();

            return $this->redirectToRoute('reunion_show', array('id' => $reunion->getId()));
        }

        return $this->render('reunion/new.html.twig', array(
            'reunion' => $reunion,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a reunion entity.
     *
     * @Route("/front/{id}", name="reunion_front")
     * @Method("GET")
     */
    public function frontAction(Request $request)
    {
        $input=$request->get('id');
        $em = $this->getDoctrine()->getManager();
        $query1 = $em->createQuery('SELECT n FROM RHBundle:Reunion n WHERE n.ide=:Men ')->setParameter(':Men',$input);
        $reunion = $query1->getResult();
        return $this->render('reunion/front.html.twig', array(
            'reunions' => $reunion,
        ));
    }

    /**
     * Finds and displays a reunion entity.
     *
     * @Route("/{id}", name="reunion_show")
     * @Method("GET")
     */
    public function showAction(Reunion $reunion)
    {
        $deleteForm = $this->createDeleteForm($reunion);

        return $this->render('reunion/show.html.twig', array(
            'reunion' => $reunion,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing reunion entity.
     *
     * @Route("/{id}/edit", name="reunion_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Reunion $reunion)
    {
        $deleteForm = $this->createDeleteForm($reunion);
        $editForm = $this->createForm('RHBundle\Form\ReunionType', $reunion);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('reunion_edit', array('id' => $reunion->getId()));
        }

        return $this->render('reunion/edit.html.twig', array(
            'reunion' => $reunion,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a reunion entity.
     *
     * @Route("/{id}", name="reunion_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Reunion $reunion)
    {
        $form = $this->createDeleteForm($reunion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($reunion);
            $em->flush();
        }

        return $this->redirectToRoute('reunion_index');
    }

    /**
     * Creates a form to delete a reunion entity.
     *
     * @param Reunion $reunion The reunion entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Reunion $reunion)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('reunion_delete', array('id' => $reunion->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
