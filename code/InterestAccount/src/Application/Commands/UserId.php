<?php

namespace src\Application\Commands;

use Ramsey\Uuid\Uuid;

/**
 * UserId Class
 */
class UserId
{
    /**
     * @var Uuid
     */
    private UUID $id;

    public function __construct(UUID $id) {
        $this->id = $id;
    }

    /**
     * @param Uuid $id
     * @return string
     */
    public function getById(UUID $id): string
    {
        $this->id = $id;
        return $id->toString();
    }
}