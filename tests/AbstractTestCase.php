<?php

namespace Tests;

use Orchestra\Testbench\TestCase;

abstract class AbstractTestCase extends TestCase
{
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('autotask.username', 'test@test.com');
        $app['config']->set('autotask.password', 'testpassword');
        $app['config']->set('autotask.integration_code', 'testintegrationcode');
        $app['config']->set('autotask.zone_url', 'https://randomurl.com');
    }

    protected function getPackageProviders($app)
    {
        return ['Anteris\Autotask\Laravel\ServiceProvider'];
    }

    protected function getPackageAliases($app)
    {
        return [
            'Autotask' => 'Anteris\Autotask\Laravel\Facade'
        ];
    }
}
