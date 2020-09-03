<?php

namespace Anteris\Autotask\API\Roles;

use GuzzleHttp\Psr7\Response;
use Spatie\DataTransferObject\DataTransferObjectCollection;

/**
 * Contains a collection of Role entities.
 * @see RoleEntity
 */
class RoleCollection extends DataTransferObjectCollection
{
    /**
     * Sets the proper return type for IDE completion.
     */
    public function current(): RoleEntity
    {
        return parent::current();
    }

    /**
     * Sets the proper return type for IDE completion.
     */
    public function offsetGet($offset): RoleEntity
    {
        return parent::offsetGet($offset);
    }

    /**
     * Creates an instance of this class from an Http response.
     *
     * @param  Response  $response  Http response.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public static function fromResponse(Response $response): RoleCollection
    {
        $array = json_decode($response->getBody(), true);

        if (isset($array['items']) === false) {
            throw new \Exception('Missing items key in response.');
        }

        return new static(
            RoleEntity::arrayOf($array['items'])
        );
    }
}
