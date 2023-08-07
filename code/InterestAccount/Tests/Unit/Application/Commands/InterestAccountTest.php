<?php

namespace Unit\Application\Commands;

use src\Application\Commands\InterestAccount;
use PHPUnit\Framework\TestCase;
use src\Application\Commands\UserId;

class InterestAccountTest extends TestCase
{
    public function testConstructor()
    {
        $userId = new UserId('8224979-406e-4e32-9458-55836e4e1f953');
        $amount = 1000.0;
        $interest = 0.05;

        $account = new InterestAccount($userId, $amount, $interest);

        $this->assertInstanceOf(InterestAccount::class, $account);
        $this->assertSame($userId, $account->getId());
        $this->assertSame($amount, $account->getAmount());
        $this->assertSame($interest, $account->getInterest());
    }

    public function testGetId()
    {
        $userId = new UserId('8224979-406e-4e32-9458-55836e4e1f953');
        $amount = 1000.0;
        $interest = 0.05;

        $account = new InterestAccount($userId, $amount, $interest);

        $this->assertSame($userId, $account->getId());
    }

    public function testSetId()
    {
        $userId = new UserId('8224979-406e-4e32-9458-55836e4e1f953');
        $amount = 1000.0;
        $interest = 0.05;

        $account = new InterestAccount($userId, $amount, $interest);

        $newUserId = new UserId('8224979-406e-4e32-9458-55836e4e1g898');
        $account->setId($newUserId);

        $this->assertSame($newUserId, $account->getId());
    }

    public function testGetAmount()
    {
        $userId = new UserId('8224979-406e-4e32-9458-55836e4e1f953');
        $amount = 1000.0;
        $interest = 0.05;

        $account = new InterestAccount($userId, $amount, $interest);

        $this->assertSame($amount, $account->getAmount());
    }

    public function testSetAmount()
    {
        $userId = new UserId('8224979-406e-4e32-9458-55836e4e1f953');
        $amount = 1000.0;
        $interest = 0.05;

        $account = new InterestAccount($userId, $amount, $interest);

        $newAmount = 1500.0;
        $account->setAmount($newAmount);

        $this->assertSame($newAmount, $account->getAmount());
    }

    public function testGetInterest()
    {
        $userId = new UserId('8224979-406e-4e32-9458-55836e4e1f953');
        $amount = 1000.0;
        $interest = 0.05;

        $account = new InterestAccount($userId, $amount, $interest);

        $this->assertSame($interest, $account->getInterest());
    }

    public function testSetInterest()
    {
        $userId = new UserId('8224979-406e-4e32-9458-55836e4e1f953');
        $amount = 1000.0;
        $interest = 0.05;

        $account = new InterestAccount($userId, $amount, $interest);

        $newInterest = 0.06;
        $account->setInterest($newInterest);

        $this->assertSame($newInterest, $account->getInterest());
    }
}
