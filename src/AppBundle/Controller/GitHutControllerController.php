<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class GitHutControllerController extends Controller
{
    /**
     * @Route("/githut", name="githut")
     */
    public function githutAction(Request $request)
    {
        return $this->render('AppBundle:githut:index.html.twig', array(
            // ...
        ));
    }

}
