<?php

namespace Anteris\Autotask\Laravel\Models;

use Anteris\Autotask\Laravel\Contracts\HasRelationships;
use Anteris\Autotask\Laravel\Relations\AbstractRelation;
use Autotask;
use Exception;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use Jenssegers\Model\Model;
use Throwable;

class AutotaskModel extends Model
{
    use HasRelationships;

    /** @var string The Autotask endpoint this model represents in plural form. (e.g. Tickets) */
    protected string $endpoint;

    /** @var int Determines how many seconds we should cache the result. (Set to 0 for never) */
    protected int $cache_time = 86400;

    /** Query builder for the Autotask API. */
    protected $query;

    /**
     * This class executes the callback function and caches the result. If the
     * action was executed once before, it returns the cached result.
     * 
     * @param  string    $cacheKey  The identifier for this cached object.
     * @param  callable  $callback  The action to be executed and cached.
     * 
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    protected function startActionWithCacheInMind(string $cacheKey, callable $callback)
    {
        // Scenario 1: We aren't caching stuff
        if (! $this->cache_time) {
            return $callback();
        }

        // Scenario 2: We are caching stuff but don't have it cached
        if (! Cache::has($cacheKey)) {
            Cache::set(
                $cacheKey,
                $callback(),
                now()->addSeconds($this->cache_time)
            );
        }

        // Scenario 3: It's cached, here you go
        return Cache::get($cacheKey);
    }

    /**
     * Executes the count request against the Autotask API.
     */
    public function executeCount()
    {
        if (!isset($this->query)) {
            throw new Exception('Unable to make a count request without a query!');
        }

        $result = $this->startActionWithCacheInMind(
            (string) $this->query,
            function () {
                return $this->query->count();
            }
        );

        unset($query);
        return $result;
    }

    /**
     * Finds the requested resources in the database.
     * 
     * @param  array|int  $search  An ID or array of IDs to be retrieved.
     * 
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function executeFind($search)
    {
        // If the items passed are an array, loop through them
        if (is_array($search)) {
            $result = [];

            foreach ($search as $id) {
                $result[] = $this->find($id);
            }

            return collect($result);
        }

        // Handle a single ID without the cache
        $result = $this->startActionWithCacheInMind(
            "{$this->endpoint}Entity-{$search}",
            function () use ($search) {
                return Autotask::{Str::pluralStudly($this->endpoint)}()->findById($search);
            }
        );

        return new static($result->toArray());
    }

    /**
     * Sends a get request using the query.
     * 
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function executeGet()
    {
        if (! isset($this->query)) {
            throw new Exception('Unable to make a get request without a query!');
        }

        $result = $this->startActionWithCacheInMind(
            (string) $this->query,
            function () {
                $items = $this->query->get();
                $array = [];

                foreach ($items as $key => $item) {
                    // If we are caching stuff, throw each item in the cache
                    if ($this->cache_time) {
                        Cache::set("{$this->endpoint}Entity-{$item->id}", $item, now()->addSeconds($this->cache_time));
                    }

                    $array[$key] = new static($item->toArray());
                }

                return $array;
            }
        );

        unset($this->query);
        return collect($result);
    }

    /**
     * Sends a loop request using the query.
     * 
     * @param  callable  $callback  The callback function to be executed on every record.
     * 
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function executeLoop(callable $callback)
    {
        if (! $this->query) {
            throw new Exception('Unable to make a loop request without a query!');
        }

        $result = $this->startActionWithCacheInMind(
            (string) $this->query,
            function () {
                $result = [];

                $this->query->loop(function ($item) use (&$result) {
                    if ($this->cache_time) {
                        Cache::set("{$this->endpoint}Entity-{$item->id}", $item, now()->addSeconds($this->cache_time));
                    }
                    $result[] = $item;
                });

                return $result;
            }
        );

        foreach ($result as $item) {
            $callback(new static($item->toArray()));
        }

        unset($this->query);
    }

    /**
     * Sets the number of records to be returned.
     * 
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function executeRecords(int $records) {
        if (!$this->query) {
            $this->query = Autotask::{Str::pluralStudly($this->endpoint)}()->query()->where($records);
        } else {
            $this->query = $this->query->records($records);
        }

        return $this;
    }

    /**
     * Sets a where statement.
     * 
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function executeWhere(
        $field,
        $operator = null,
        $value = null,
        $udf = false,
        $conjuction = 'AND'
    ) {
        if (! $this->query) {
            $this->query = Autotask::{Str::pluralStudly($this->endpoint)}()->query()->where(
                $field,
                $operator,
                $value,
                $udf,
                $conjuction
            );
        } else {
            $this->query = $this->query->where(
                $field,
                $operator,
                $value,
                $udf,
                $conjuction
            );
        }

        return $this;
    }

    /**
     * Sets an OR where statement.
     * 
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function executeOrWhere(
        $field,
        $operator = null,
        $value = null,
        $udf = false
    ) {
        return $this->executeWhere($field, $operator, $value, $udf, 'OR');
    }

    /**
     * Handle dynamic method calls into the model.
     *
     * @param  string  $method
     * @param  array  $parameters
     * @return mixed
     */
    public function __call($method, $parameters)
    {
        // The methods we call are prefixed with "execute"
        $method = 'execute' . ucwords($method);
        if (method_exists($this, $method)) {
            return $this->$method(...$parameters);
        }
    }

    /**
     * Handle dynamic static method calls into the model.
     *
     * @param  string  $method
     * @param  array  $parameters
     * @return mixed
     */
    public static function __callStatic($method, $parameters)
    {
        $class = new static;

        if (method_exists($class, $method)) {
            return $class->$method(...$parameters);
        }

        return parent::__callStatic($method, $parameters);
    }

    /**
     * Handle dynamic property calls into the model.
     *
     * @param  string  $key
     * @return mixed
     */
    public function __get($key)
    {
        if (method_exists($this, $key)) {
            try {
                $method = $this->{$key}();

                if ($method instanceof AbstractRelation) {
                    return $method->resolve($this);
                }
            } catch (Throwable $error) {
                // Do nothing
            }
        }

        return parent::__get($key);
    }
}
