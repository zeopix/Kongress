<?php

namespace Iga\KongressBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;

class FacebookController extends Controller
{
    /**
     * @Route("/facebook/")
     */
    public function indexAction()
    {
	return new Response("hi facebook user");
    }
}
