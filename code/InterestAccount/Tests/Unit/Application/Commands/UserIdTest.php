<?php

namespace Unit\Application\Commands;

use Ramsey\Uuid\Uuid;
use src\Application\Commands\UserId;
use PHPUnit\Framework\TestCase;

class UserIdTest extends TestCase
{
    /**
     * @var UUID
     */
    private $id;

    public function testConstructor()
    {
        $userId = new UserId($this->id);

        $this->assertInstanceOf(UserId::class, $userId);
        $this->assertSame($this->id, $userId->getById($id));
    }

    public function testGetById()
    {
        $userId = new UserId($this->id);

        $this->assertSame($this->id->toString(), $userId->getById($id));
    }

}
