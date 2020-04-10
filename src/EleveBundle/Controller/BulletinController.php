<?php

namespace EleveBundle\Controller;

use EleveBundle\Entity\Bulletin;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Bulletin controller.
 *
 * @Route("bulletin")
 */
class BulletinController extends Controller
{
    /**
     * Lists all bulletin entities.
     *
     * @Route("/", name="bulletin_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $bulletins = $em->getRepository('EleveBundle:Bulletin')->findAll();

        return $this->render('bulletin/index.html.twig', array(
            'bulletins' => $bulletins,
        ));
    }

    /**
     * Creates a new bulletin entity.
     *
     * @Route("/new", name="bulletin_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $bulletin = new Bulletin();
        $form = $this->createForm('EleveBundle\Form\BulletinType', $bulletin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $pp=$bulletin->getIdEleve()->getId();
            $bulletin->setIde($pp);
            $em = $this->getDoctrine()->getManager();
            $em->persist($bulletin);
            $em->flush();

            return $this->redirectToRoute('bulletin_show', array('id' => $bulletin->getId()));
        }

        return $this->render('bulletin/new.html.twig', array(
            'bulletin' => $bulletin,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a bulletin entity.
     *
     * @Route("/front/{id}", name="bulletin_front")
     * @Method("GET")
     */
    public function frontAction(Request $request)
    {
        $input=$request->get('id');
        $em = $this->getDoctrine()->getManager();
        $query1 = $em->createQuery('SELECT n FROM EleveBundle:Bulletin n WHERE n.ide=:Men ')->setParameter(':Men',$input);
        $notes = $query1->getResult();
        return $this->render('bulletin/front.html.twig', array(
            'bulletins' => $notes,
        ));
    }

    /**
     * Finds and displays a bulletin entity.
     *
     * @Route("/{id}", name="bulletin_show")
     * @Method("GET")
     */
    public function showAction(Bulletin $bulletin)
    {
        $deleteForm = $this->createDeleteForm($bulletin);

        return $this->render('bulletin/show.html.twig', array(
            'bulletin' => $bulletin,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing bulletin entity.
     *
     * @Route("/{id}/edit", name="bulletin_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Bulletin $bulletin)
    {
        $deleteForm = $this->createDeleteForm($bulletin);
        $editForm = $this->createForm('EleveBundle\Form\BulletinType', $bulletin);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('bulletin_edit', array('id' => $bulletin->getId()));
        }

        return $this->render('bulletin/edit.html.twig', array(
            'bulletin' => $bulletin,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a bulletin entity.
     *
     * @Route("/{id}", name="bulletin_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Bulletin $bulletin)
    {
        $form = $this->createDeleteForm($bulletin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($bulletin);
            $em->flush();
        }

        return $this->redirectToRoute('bulletin_index');
    }

    /**
     * Creates a form to delete a bulletin entity.
     *
     * @param Bulletin $bulletin The bulletin entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Bulletin $bulletin)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('bulletin_delete', array('id' => $bulletin->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
