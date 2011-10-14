<?php

namespace Navis\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class MyspaceController extends Controller
{
    /**
     * @Route("/My-Space", name="_myspace")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();
        //esto recupera el objeto UserPersist
        $user = $this->get('security.context')->getToken()->getUser()->getPersistObject($this->get('security.context')->getToken(), $em);

        
        
        return array();
    }
}
