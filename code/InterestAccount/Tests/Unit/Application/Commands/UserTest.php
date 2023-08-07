<?php

namespace Unit\Application\Commands;

use PHPUnit\Framework\MockObject\Exception;
use PHPUnit\Framework\MockObject\MockObject;
use RuntimeException;
use src\Application\Commands\User;
use PHPUnit\Framework\TestCase;
use src\Application\Commands\UserId;

class UserTest extends TestCase
{
    /**
     * @var (object&MockObject)|MockObject|UserId|(UserId&object&MockObject)|(UserId&MockObject)
     */
    private $id;

    /**
     * @var User
     */
    private User $user;

    /**
     * @throws Exception
     */
    protected function setUp(): void
    {
        $this->id = $this->createMock(UserId::class);
        $this->user = new User($this->id, null);
    }

    public function testHasIncomeInformation()
    {
        $this->assertFalse($this->user->hasIncomeInformation());

        $this->user = new User($this->id, 1000);
        $this->assertTrue($this->user->hasIncomeInformation());
    }

    public function testIncomePerMonth()
    {
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage("{$this->id} has not provided income information.");

        $this->user->incomePerMonth();

        $this->user = new User($this->id, 2000);
        $this->assertSame(2000, $this->user->incomePerMonth());
    }

    public function testId()
    {
        $this->assertInstanceOf(UserId::class, $this->user->id());
    }
}
