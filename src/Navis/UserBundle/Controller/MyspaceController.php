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
        $user = $this->get('security.context')->getToken()->getUser()->getPersistObject($this->get('security.context')->getToken(), $em, $session = $this->get('request')->getSession());

        
        //print_r($this->get('security.context')->getToken());

        //$user->getFacebook()->getClientId();
        return array();
    }

        /**
     * @Route("/My-Space/link-google", name="_myspace_linkGoogle")
     * @Template()
     */
    public function linkGoogleAction()
    {
        $em = $this->getDoctrine()->getEntityManager();
        $user = $this->get('security.context')->getToken()->getUser()->getPersistObject($this->get('security.context')->getToken(), $em, $session = $this->get('request')->getSession());

        
        //creamos un token
        $accessToken = $em->getRepository('NavisUserBundle:User')->createToken($user);

        //ahora pongo el access token en la sesion

        $session = $this->get('request')->getSession();

        $session->set('accessToken', $accessToken);
        $session->set('isLinkin', "1");
        

        return new \Symfony\Component\HttpFoundation\RedirectResponse("/login/google");
    }
}
