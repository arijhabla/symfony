<?php

namespace ClubBundle\Controller;

use ClubBundle\Entity\Affecter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Affecter controller.
 *
 * @Route("affecter")
 */
class AffecterController extends Controller
{
    /**
     * Lists all affecter entities.
     *
     * @Route("/", name="affecter_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $affecters = $em->getRepository('ClubBundle:Affecter')->findAll();

        return $this->render('affecter/index.html.twig', array(
            'affecters' => $affecters,
        ));
    }

    /**
     * Creates a new affecter entity.
     *
     * @Route("/new", name="affecter_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $affecter = new Affecter();
        $form = $this->createForm('ClubBundle\Form\AffecterType', $affecter);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $pp=$affecter->getNomClub()->getId();
            $affecter->setCli($pp);
            $em = $this->getDoctrine()->getManager();
            $em->persist($affecter);
            $em->flush();

            return $this->redirectToRoute('affecter_show', array('id' => $affecter->getId()));
        }

        return $this->render('affecter/new.html.twig', array(
            'affecter' => $affecter,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a affecter entity.
     *
     * @Route("/{id}", name="affecter_show")
     * @Method("GET")
     */
    public function showAction(Affecter $affecter)
    {
        $deleteForm = $this->createDeleteForm($affecter);

        return $this->render('affecter/show.html.twig', array(
            'affecter' => $affecter,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Finds and displays a note entity.
     *
     * @Route("/front/{id}", name="affecter_front")
     * @Method("GET")
     */
    public function frontAction(Request $request)
    {
        $input=$request->get('id');
        $em = $this->getDoctrine()->getManager();
        $query1 = $em->createQuery('SELECT n FROM ClubBundle:Affecter n WHERE n.cli=:Men ')->setParameter(':Men',$input);
        $notes = $query1->getResult();
        return $this->render('affecter/front.html.twig', array(
            'Affecters' => $notes,
        ));
    }

    /**
     * Displays a form to edit an existing affecter entity.
     *
     * @Route("/{id}/edit", name="affecter_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Affecter $affecter)
    {
        $deleteForm = $this->createDeleteForm($affecter);
        $editForm = $this->createForm('ClubBundle\Form\AffecterType', $affecter);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('affecter_edit', array('id' => $affecter->getId()));
        }

        return $this->render('affecter/edit.html.twig', array(
            'affecter' => $affecter,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a affecter entity.
     *
     * @Route("/{id}", name="affecter_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Affecter $affecter)
    {
        $form = $this->createDeleteForm($affecter);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($affecter);
            $em->flush();
        }

        return $this->redirectToRoute('affecter_index');
    }

    /**
     * Creates a form to delete a affecter entity.
     *
     * @param Affecter $affecter The affecter entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Affecter $affecter)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('affecter_delete', array('id' => $affecter->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
