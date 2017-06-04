<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class GitHutController extends Controller
{
    /**
     * @Route("/githut/{username}", name="githut", defaults = {"username":"benjivds"})
     */
    public function githutAction(Request $request, $username)
    {
        $reposData = $this->get('github_api')->getRepos($username);
        $templateData = $reposData;

        return $this->render('AppBundle:githut:index.html.twig', $templateData);
    }

    

     /**
     * @Route("/githut/profile/{username}", name="githut/profile", defaults = {"username":"benjivds"})
     */
     public function profileAction(Request $request, $username){
         $profileData = $this->get('github_api')->getProfile($username);
         return $this->render('AppBundle:githut:profile.html.twig',$profileData);
     }

    /**
     * @Route("/githut/repos/{username}", name="githut/repos", defaults = {"username":"benjivds"})
     */
     public function reposAction(Request $request, $username){
         $profileData = $this->get('github_api')->getRepos($username);
         dump($profileData);
         exit;
         return $this->render('AppBundle:githut:repos.html.twig',$profileData);
     }



}
