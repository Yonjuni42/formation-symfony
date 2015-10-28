<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ComputerControllerTest extends WebTestCase
{
    public function testCompleteScenario()
    {
        // Create a new client to browse the application
        $client = static::createClient();

        // Create a new entry in the database
        $crawler = $client->request('GET', '/park/computer/');
        $this->assertEquals(200, $client->getResponse()->getStatusCode(), "Unexpected HTTP status code for GET /computer/");
        $crawler = $client->click($crawler->selectLink('Add computer')->link());

        // Fill in the form and submit it
        $form = $crawler->selectButton('Create')->form(array(
            'appbundle_computer[name]'  => 'Test',
            'appbundle_computer[ip]'  => '192.test.1',
            // ... other fields to fill
        ));

        $client->submit($form);
        $crawler = $client->followRedirect();

        // Check data in the show view
        $this->assertGreaterThan(0, $crawler->filter('td:contains("Test")')->count(), 'Missing element td:contains("Test")');

        // Edit the entity
        $crawler = $client->click($crawler->selectLink('Edit')->link());

        $form = $crawler->selectButton('Update')->form(array(
            'appbundle_computer[name]'  => 'Foo',
            'appbundle_computer[ip]'  => '192.foo.1',
            'appbundle_computer[enabled]'  => true,
            // ... other fields to fill
        ));
        $form['appbundle_computer[person]']->select('28');

        $client->submit($form);
        $crawler = $client->followRedirect();

        // Check the element contains an attribute with value equals "Foo"
        $this->assertGreaterThan(0, $crawler->filter('[value="Foo"]')->count(), 'Missing element [value="Foo"]');

        // Delete the entity
        $client->submit($crawler->selectButton('Delete')->form());
        $crawler = $client->followRedirect();

        // Check the entity has been deleted on the list
        $this->assertNotRegExp('/Foo/', $client->getResponse()->getContent());
    }
}
