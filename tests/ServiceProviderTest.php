<?php

namespace Tests;

use Anteris\Autotask\Client;

/**
 * Handles testing for the service provider class.
 */
class ServiceProviderTest extends AbstractTestCase
{
    /**
     * This test ensures that the service provider can correctly make the client.
     */
    public function test_it_can_create_autotask_client()
    {
        $this->assertInstanceOf(
            Client::class,
            $this->app->make(Client::class)
        );
    }
}
