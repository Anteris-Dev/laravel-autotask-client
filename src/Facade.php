<?php

namespace Anteris\Autotask\Laravel;

use Anteris\Autotask\Client;
use Illuminate\Support\Facades\Facade as LaravelFacade;

/**
 * Allows a developer to reference the Autotask client methods using Autotask::
 */
class Facade extends LaravelFacade
{
    /**
     * @inheritdoc
     */
    protected static function getFacadeAccessor()
    {
        return Client::class;
    }
}
