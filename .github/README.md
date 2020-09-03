# Bringing the Autotask Client to Laravel
This package bridges the Autotask client to Laravel by injecting it into the application container.

# To Install
Run `composer require anteris-dev/laravel-autotask-client`.

To publish the configuration file, use the command `php artisan vendor:publish --provider 'Anteris\Autotask\Laravel\ServiceProvider'`. Now you can enter your Autotask API information into the configuration file found at 'config/autotask.php'.

To register the facade so you may use the client like this: `Autotask::tickets()->findById(0)` add the following line to the 'aliases' key in the Laravel file 'config/app.php'.

```php
'Autotask' => Anteris\Autotask\Laravel\Facade::class,
```

# Getting Started
You can inject the Autotask client like any other class. Laravel will automatically create the client and setup your credentials whenever you need it. An example is listed below.

```php

use Anteris\Autotask\Client as AutotaskClient;

Route::get('/', function (AutotaskClient $autotask) {

    $ticket = $autotask->tickets()->findById(0);

});

```

You can also setup the facade (see above) for even easier access to the client. See the example below.

```php

Route::get('/', function () {

    Autotask::tickets()->findById(0);

});

```

For more information about the client, check out the documentation over [here](https://github.com/anteris-dev/autotask-client).
