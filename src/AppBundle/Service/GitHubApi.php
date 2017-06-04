<?php

namespace AppBundle\Service;

class GitHubApi
{

    public function getProfile($username){
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', 'https://api.github.com/users/' . $username);

        $data = json_decode($response->getBody()->getContents(),true);

        return [
            'avatar_url'  => $data['avatar_url'],
            'name'        => $data['name'],
            'username'    => $username,
            'login'       => $data['login'],
            'details'     => [
                'company'   => $data['company'],
                'location'  => $data['location'],
                'joined_on' => 'Joined on ' . (new \DateTime($data['created_at']))->format('d m Y'),
            ],
            'blog'        => $data['blog'],
            'social_data' => [
                'followers'    => $data['followers'],
                'following'    => $data['following'],
                'public_repos' => $data['public_repos'],
            ]
            ];
    }

    public function getRepos($username){
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', 'https://api.github.com/users/' . $username .'/repos');

        $data = json_decode($response->getBody()->getContents(),true);
        
        return [
            'username' => $username,
            'repo_count' => count($data),
            'most_stars' => array_reduce($data, function($mostStars, $currentRepo){
                return $currentRepo['stargazers_count'] > $mostStars ? $currentRepo['stargazers_count'] : $mostStars;
            },0),
            'repos' =>$data
            ];
    }

}