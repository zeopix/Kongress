<?php

namespace Iga\KongressBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Iga\KongressBundle\Entity\User;
use Iga\KongressBundle\Form\UserType;

/**
 * User controller.
 *
 * @Route("/secured")
 */
class SecuredController extends Controller
{
    /**
     * Lists all User entities.
     *
     * @Route("/", name="secured")
     */
    public function indexAction()
    {
        return $this->render('IgaKongressBundle:Secured:index.html.twig',array('name' => 'bh'));
    }
    
    

}
