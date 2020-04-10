<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class SecuirityController extends Controller
{

    /**
     * @Route("/zay")
     */
    public function indexAction()
    {
        return $this->render('ClubBundle:Default:index.html.twig');
    }

    /**
     * @Route("/redirect")
     */
    public function redirectAction()
    {
        $authChecker = $this->container->get('security.authorization_checker');
        if($authChecker->isGranted('ROLE_ADMIN')) {
            return $this->redirectToRoute('eleve_index');
        }
        else if($authChecker->isGranted('ROLE_COMPTABLE')) {
            return $this->redirectToRoute('conge_index');
        }
        else if($authChecker->isGranted('ROLE_USER')) {
            return $this->render('@App/Default/index.html.twig');
        }
        else{
            return $this->render('@FOSUser/Security/login.html.twig');
        }
    }
}
