<?php

namespace CompBundle\Controller;

use CompBundle\Entity\Conge;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Conge controller.
 *
 * @Route("conge")
 */
class CongeController extends Controller
{
    /**
     * Lists all conge entities.
     *
     * @Route("/", name="conge_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $conges = $em->getRepository('CompBundle:Conge')->findAll();

        return $this->render('conge/index.html.twig', array(
            'conges' => $conges,
        ));
    }

    /**
     * Lists all employe entities.
     *
     * @Route("/salaire", name="conge_salaire")
     * @Method("GET")
     */
    public function salaireAction()
    {
        $em = $this->getDoctrine()->getManager();

        $employes = $em->getRepository('RHBundle:Employe')->findAll();

        return $this->render('conge/salaire.html.twig', array(
            'employes' => $employes,
        ));
    }


    /**
     * Creates a new affectation entity.
     *
     * @Route("/salaire", name="salaire_mod")
     * @Method({"GET", "POST"})
     */
    public function searchAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();



        if($request->isMethod("POST"))
        {
            $salaire = $request->get('salaire');
            $id = $request->get('id');
            $qb = $em->createQueryBuilder();
            $queryx = $qb->update('RHBundle:Employe', 'p')
                ->set('p.salaire', $salaire)
                ->where('p.id = :id')
                ->setParameter('id', $id)
                ->getQuery();
            $queryx->execute();
            $employes = $em->getRepository('RHBundle:Employe')->findAll();

        }


        return $this->render('Conge/salaire.html.twig', array(
            'employes' => $employes,
        ));
    }

    /**
     * Creates a new conge entity.
     *
     * @Route("/new", name="conge_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $conge = new Conge();
        $form = $this->createForm('CompBundle\Form\CongeType', $conge);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $tt=$conge->getIdEmploye()->getNbrConge()+1;
            $conge->getIdEmploye()->setNbrConge($tt);
            $em = $this->getDoctrine()->getManager();
            $em->persist($conge);
            $em->flush();

            return $this->redirectToRoute('conge_show', array('id' => $conge->getId()));
        }

        return $this->render('conge/new.html.twig', array(
            'conge' => $conge,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a conge entity.
     *
     * @Route("/{id}", name="conge_show")
     * @Method("GET")
     */
    public function showAction(Conge $conge)
    {
        $deleteForm = $this->createDeleteForm($conge);

        return $this->render('conge/show.html.twig', array(
            'conge' => $conge,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing conge entity.
     *
     * @Route("/{id}/edit", name="conge_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Conge $conge)
    {
        $deleteForm = $this->createDeleteForm($conge);
        $editForm = $this->createForm('CompBundle\Form\CongeType', $conge);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('conge_edit', array('id' => $conge->getId()));
        }

        return $this->render('conge/edit.html.twig', array(
            'conge' => $conge,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a conge entity.
     *
     * @Route("/{id}", name="conge_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Conge $conge)
    {
        $form = $this->createDeleteForm($conge);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($conge);
            $em->flush();
        }

        return $this->redirectToRoute('conge_index');
    }

    /**
     * Creates a form to delete a conge entity.
     *
     * @param Conge $conge The conge entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Conge $conge)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('conge_delete', array('id' => $conge->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
