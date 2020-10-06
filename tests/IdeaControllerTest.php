<?php

namespace App\Tests;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class IdeaControllerTest extends WebTestCase
{
    public function testList()
    {
        //crée un client HTTP qui peut faire des requêtes à notre site
        //on le voir un peu comme un navigateur genre chrome
        $client = static::createClient();
        //déclenche une requête de type GET
        //on reçoit un WebCrawler de symfony en réponse !
        $crawler = $client->request('GET', '/ideas');

        //code de réponse = 200 ou 201 ou 20...
        $this->assertResponseIsSuccessful();

        $this->assertSelectorExists("body", "no body wtf!?");
        $this->assertSelectorTextContains('main h1', 'All ideas');

        //click sur le lien menant à l'accueil
        $crawler = $client->clickLink('Home');

    }


    public function testAddIdeaPageRedirectToLogin()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/ideas/add');
        $this->assertResponseRedirects('/login', 302, 'ça devrait rediriger cthistoire là');
    }

    public function testConnectedUserCanSeeAddIdeaPage()
    {
        $client = static::createClient();
        $userRepository = static::$container->get(UserRepository::class);

        // retrieve the test user
        $testUser = $userRepository->findOneByEmail('yo@yo.com');

        // simulate $testUser being logged in
        $client->loginUser($testUser);

        $crawler = $client->request('GET', '/ideas/add');
        $this->assertResponseIsSuccessful("this connected user should see the page");
    }
}
