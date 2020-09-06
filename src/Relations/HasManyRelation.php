<?php

namespace Anteris\Autotask\Laravel\Relations;

use Anteris\Autotask\Laravel\Models\AutotaskModel;
use Anteris\Autotask\Laravel\Relations\AbstractRelation;
use Illuminate\Support\Str;

class HasManyRelation extends AbstractRelation
{
    /** @var string The class being related. */
    protected string $class;

    /** @var string The reference key on the parent class. */
    protected string $foreignID;

    /** @var string The primary key on the class being related. */
    protected string $localID;

    /**
     * Builds a relationship based on the information passed.
     * 
     * @param  string  $parentClass     The parent class that has this relationship.
     * @param  string  $class           The class being related.
     * @param  string  $foreignID       The reference key on the parent class.
     * @param  string  $localID         The primary key on the class being related.
     * 
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function __construct(
        string $parentClass,
        string $class,
        ?string $foreignID = null,
        ?string $localID = null
    )
    {
        // This section removes the namespace and keeps the class name.
        $parentClassName = array_pop(explode('\\', $parentClass));

        // This section determines the relationship information
        $this->class = $class;

        if (! $foreignID) {
            $this->foreignID = Str::camel($parentClassName) . 'ID';
        } else {
            $this->foreignID = $foreignID;
        }

        if (! $localID) {
            $this->localID = 'id';
        } else {
            $this->localID = $localID;
        }
    }

    /**
     * Resolves the actual relationship.
     * 
     * @param  AutotaskModel  $model  The model we are resolving this relationship for.
     * 
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function resolve(AutotaskModel $model)
    {
        if ($id = $model->getAttribute($this->localID)) {
            $result = [];
            ($this->class)::where($this->foreignID, 'eq', $id)->loop(
                function ($item) use (&$result) {
                    $result[] = $item;
                }
            );
            return collect($result);
        }

        return null;
    }
}
