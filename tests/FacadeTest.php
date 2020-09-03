<?php

namespace Tests;

use Anteris\Autotask\Client;
use Autotask;

/**
 * Tests for the facade class.
 */
class FacadeTest extends AbstractTestCase
{
    /**
     * Makes sure that when the facade is used, its getting an instance of the Autotask client
     */
    public function test_facade_is_an_instance_of_autotask_client()
    {
        $this->assertInstanceOf(Client::class, Autotask::getFacadeRoot());
    }
}
