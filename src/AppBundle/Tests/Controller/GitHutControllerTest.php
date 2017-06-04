<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class GitHutControllerTest extends WebTestCase
{
    public function testGithut()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/githut');
    }

}
