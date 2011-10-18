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

        $company = new \Navis\UserBundle\Entity\Company();
        $formCompany = $this->createForm(new \Navis\UserBundle\Form\CompanyType(), $company);
        return array('User' => $user, 'FormCompany' => $formCompany->createView());
    }

    /**
     * @Route("/Company-Register", name="_myspace_register_company")
     * @Template()
     */
    public function registerCompanyAction()
    {
        $em = $this->getDoctrine()->getEntityManager();
        $user = $this->get('security.context')->getToken()->getUser()->getPersistObject($this->get('security.context')->getToken(), $em, $session = $this->get('request')->getSession());

        $company = new \Navis\UserBundle\Entity\Company();

        $formCompany = $this->createForm(new \Navis\UserBundle\Form\CompanyType(), $company);

        $re = $this->get('request');

        if($re->getMethod() == "POST")
        {
           $formCompany->bindRequest($re);

           $company->setUser($user);
           $user->setCompany($company);

           $em->persist($company);
           $em->persist($user);

           $em->flush();
        }

        return new \Symfony\Component\HttpFoundation\RedirectResponse($this->get('router')->generate('_myspace'));
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
