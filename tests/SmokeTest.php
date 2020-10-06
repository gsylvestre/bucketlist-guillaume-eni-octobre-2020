<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SmokeTest extends WebTestCase
{
    /**
     * @dataProvider provideUrls
     */
    public function testAllPagesAreSuccessfull($url)
    {
        $client = static::createClient();
        $crawler = $client->request('GET', $url);
        $this->assertResponseIsSuccessful();
    }


    public function provideUrls()
    {
        return [
            ['/'],
            ['/ideas'],
            ['/ideas/details/2'],
            ['/ideas/details/3'],
        ];
    }
}
