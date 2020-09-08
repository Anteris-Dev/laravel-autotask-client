<?php

namespace Anteris\Autotask\Laravel\Contracts;

use Anteris\Autotask\Laravel\Relations\BelongsToRelation;
use Anteris\Autotask\Laravel\Relations\HasManyRelation;

trait HasRelationships
{
    /**
     * Signifies a relationship between this model and another Autotask model.
     * 
     * @param  string  $class       The name of the class we are specifying a relationship for.
     * @param  string  $foreignID   Name of the ID of this model on the opposite side.
     * @param  string  $localID     Name of the ID of this model on this side.
     * 
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function belongsTo($class, $foreignID = null, $localID = null)
    {
        return new BelongsToRelation($class, $foreignID, $localID);
    }

    /**
     * Signifies many relationships between this model and other Autotask models.
     * 
     * @param  string  $class       The name of the class we are specifying a relationship for.
     * @param  string  $foreignID   Name of the ID of this model on the opposite side.
     * @param  string  $localID     Name of the ID of this model on this side.
     * 
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function hasMany($class, $foreignID = null, $localID = null)
    {
        return new HasManyRelation(static::class, $class, $foreignID, $localID);
    }
}
