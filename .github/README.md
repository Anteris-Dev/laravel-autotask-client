# Bringing the Autotask Client to Laravel
This package bridges the Autotask client to Laravel by injecting it into the application container.

# To Install
Run `composer require anteris-dev/laravel-autotask-client`.

To publish the configuration file, use the command `php artisan vendor:publish --provider 'Anteris\Autotask\Laravel\ServiceProvider'`. Now you can enter your Autotask API information in the configuration file found at _config/autotask.php_ or preferablly, in your _.env_ file using the keys below.

```
AUTOTASK_USERNAME=username
AUTOTASK_SECRET=secret
AUTOTASK_INTEGRATION_CODE=integration-code
AUTOTASK_ZONE_URL=https://example.com
```

To register the facade so you may use the client like this: `Autotask::tickets()->findById(0)` add the following line to the 'aliases' key in the Laravel file _config/app.php_.

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

# WIP Section
We are currently working on a model that can be extended and interacted with like other Laravel models (relationships loaded, etc.). These models support caching the responses so requests are not constantly being made against the Autotask server. You can specify the number of seconds a response should be cached by setting the `$cache_time` variable on your model. By default this is set to 24 hours, settings this to 0 disables the cache.

- **Note**: These are not compatible with Eloquent models / relationships.

## To Install

Run `composer require anteris-dev/laravel-autotask-client:dev-master`.

## Getting Started
Create a new model by extending the Autotask model.

```php

use Anteris\Autotask\Laravel\Models\AutotaskModel;

class Ticket extends AutotaskModel
{
    protected string $endpoint = 'Tickets'; // Must be the plural form of the endpoint
    protected int $cache_time  = 86400;     // 24 hours in seconds
}

// Supported actions:
Ticket::count(); // Used like the count in the query builder
Ticket::find();  // Array of IDs or an ID
Ticket::get(); // Used like the get in the query builder
Ticket::loop(); // Used like the loop in the query builder
Ticket::where(); // Used like the where in the query builder
Ticket::orWhere(); // Used like the orWhere in the query builder

```

## Defining Relationships
Current belongsTo() and hasMany() relationships amongst other Autotask models is supported. These are defined as shown below.

```php

use Anteris\Autotask\Laravel\Models\AutotaskModel;

class Contact extends AutotaskModel
{
    protected string $endpoint = 'Contacts'; // Must be the plural form of the endpoint
    protected int $cache_time  = 86400;      // 24 hours in seconds

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}

// Relationships can be referenced like normal Laravel models:
$contact = Contact::find(1);

echo $contact->company->companyName;

```
