<?php

namespace ParkBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CalculatorControllerTest extends WebTestCase
{
    /**
     * Test for the Calculator controller
     */
    public function testCompleteScenario()
    {
        $a = 6; $b = 5; $expectedSum = $a + $b; $expectedProduct = $a * $b;

        // Create a new client to browse the application
        $client = static::createClient();

        $crawler = $client->request('GET', "/park/calculator/sum/$a/$b");
        $this->assertEquals(200, $client->getResponse()->getStatusCode(), "Unexpected HTTP status code for GET /computer/");
        $this->assertEquals($expectedSum, $crawler->filter('div#result')->text());

        $crawler = $client->request('GET', "/park/calculator/product/$a/$b");
        $this->assertEquals(200, $client->getResponse()->getStatusCode(), "Unexpected HTTP status code for GET /computer/");
        $this->assertEquals($expectedProduct, $crawler->filter('div#result')->text());
    }
}
