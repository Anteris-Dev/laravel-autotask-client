<?php

namespace Anteris\Autotask\Laravel\Relations;

use Anteris\Autotask\Laravel\Models\AutotaskModel;
use Anteris\Autotask\Laravel\Relations\AbstractRelation;
use Illuminate\Support\Str;

class BelongsToRelation extends AbstractRelation
{
    /** @var string The class being related. */
    protected string $class;

    /** @var string The primary key on the class being related. */
    protected string $foreignID;

    /** @var string The reference key on this parent class. */
    protected string $localID;

    /**
     * Builds a relationship based on the information passed.
     * 
     * @param  string  $class           The class being related.
     * @param  string  $foreignID       The primary key on the class being related.
     * @param  string  $localID         The reference key on this parent class.
     * 
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function __construct($class, $foreignID = null, $localID = null)
    {
        // This section removes the namespace and keeps the class name.
        $className = explode('\\', $class);
        $className = array_pop($className);

        // This section determines the relationship information
        $this->class = $class;

        if (!$foreignID) {
            $this->foreignID = 'id';
        } else {
            $this->foreignID = $foreignID;
        }

        if (!$localID) {
            $this->localID = Str::camel($className) . 'ID';
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
        if (($id = $model->getAttribute($this->localID)) !== null) {
            return ($this->class)::find($id);
        }

        return null;
    }
}
