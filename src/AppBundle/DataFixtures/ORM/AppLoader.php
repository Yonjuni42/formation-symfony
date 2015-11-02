<?php

namespace AppBundle\DataFixtures\ORM;

use Hautelook\AliceBundle\Alice\DataFixtureLoader;
use Nelmio\Alice\Fixtures;

/**
 * Class AppLoader
 * @package AppBundle\DataFixtures\ORM
 */
class AppLoader extends DataFixtureLoader
{
    /**
     * {@inheritDoc}
     */
    protected function getFixtures()
    {
        return array(
            __DIR__ . '/user.yml',
            __DIR__ . '/person.yml',
            __DIR__ . '/computer.yml'
        );
    }
}