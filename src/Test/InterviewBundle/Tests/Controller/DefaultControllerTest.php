<?php

namespace Test\InterviewBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testSuccessfulContributions()
    {
        $client = static::createClient();
        $client->request('GET', '/contributions');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function testOOPContribution()
    {
        $client = static::createClient();
        $client->request('GET', '/contributions/OOP');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function testFakeContribution()
    {
        $client = static::createClient();
        $client->request('GET', '/contributions/fake');

        $this->assertEquals(404, $client->getResponse()->getStatusCode());
    }
}
