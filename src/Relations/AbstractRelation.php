<?php

namespace Anteris\Autotask\Laravel\Relations;

use Anteris\Autotask\Laravel\Models\AutotaskModel;

abstract class AbstractRelation
{
    /**
     * Resolves the relationship utilizing the model passed.
     */
    abstract public function resolve(AutotaskModel $model);
}
