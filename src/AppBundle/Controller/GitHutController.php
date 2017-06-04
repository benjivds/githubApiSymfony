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
        $templateData = [
            'username' => $username,
            // new data here
            'repo_count' => 100,
            'most_stars' => 7,
            'repos' => [
                [
                    'url' => 'https://codereviewvideos.com',
                    'name' => 'Code Review Videos',
                    'description' => 'some repo description',
                    'stargazers_count' => '999',
                ],
                [
                    'url' => 'http://bbc.co.uk',
                    'name' => 'The BBC',
                    'description' => 'not a real repo',
                    'stargazers_count' => '666',
                ],
                [
                    'url' => 'http://google.co.uk',
                    'name' => 'Google',
                    'description' => 'another fake repo description',
                    'stargazers_count' => '333',
                ],
            ]
            ];

        return $this->render('AppBundle:githut:index.html.twig', $templateData);
    }

     /**
     * @Route("/githut/profile/{username}", name="githut/profile", defaults = {"username":"benjivds"})
     */
     public function profileAction(Request $request, $username){
         $profileData = $this->get('github_api')->getProfile($username);
         return $this->render('AppBundle:githut:profile.html.twig',$profileData);
     }




}
