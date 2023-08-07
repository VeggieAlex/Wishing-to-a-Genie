<?php

namespace Unit\Application\Commands;

use src\Application\Commands\Account;
use Exception;
use src\Application\Commands\InterestAccount;
use PHPUnit\Framework\TestCase;
use src\Application\Commands\SkippedPayment;
use src\Application\Commands\Statement;

class AccountTest extends TestCase
{
    private $interestAccount;
    private $statements;
    private $skippedChange;
    private Account $account;

    /**
     * @throws \PHPUnit\Framework\MockObject\Exception
     */
    protected function setUp(): void
    {
        $this->interestAccount = $this->createMock(InterestAccount::class);
        $this->statements = $this->createMock(Statement::class);
        $this->skippedChange = $this->createMock(SkippedPayment::class);

        $this->account = new Account(
            $this->interestAccount,
            $this->statements,
            $this->skippedChange
        );
    }

    public function testGetIncome()
    {
        $userId1 = '88224979-406e-4e32-9458-55836e4e1f95';
        $userId2 = '1085648a-0cb4-4b16-aabc-b6d25af0b9ac';
        $userId3 = '12345678';

        $result1 = $this->account->getIncome($userId1);
        $this->assertEquals(499999, $result1);

        $result2 = $this->account->getIncome($userId2);
        $this->assertEquals(10000000000, $result2);

        $result3 = $this->account->getIncome($userId3);
        $this->assertEquals(100000000000000, $result3);
    }

    public function testDeposit()
    {
        $this->interestAccount
            ->expects($this->once())
            ->method('getAmount')
            ->willReturn(1000);

        $this->interestAccount
            ->expects($this->once())
            ->method('setAmount')
            ->with(2000);

        $this->account->deposit(1000);
    }

    public function testCalculateInterest()
    {
        $income1 = 499999;
        $income2 = 6000;

        $result1 = $this->account->calculateInterest($income1);
        $this->assertEquals(4.99999, $result1);

        $result2 = $this->account->calculateInterest($income2);
        $this->assertEquals(6, $result2);
    }

    /**
     * @throws Exception
     */
    public function testOpenInterestAccount()
    {
        $userId1 = '72fb8906-c1d7-45b3-b805-ee9b96285ae0';
        $userId2 = '88224979-406e-4e32-9458-55836e4e1f95';

        $this->interestAccount
            ->expects($this->once())
            ->method('getAmount')
            ->willReturn(1000);

        $this->statements
            ->expects($this->once())
            ->method('getTransactions')
            ->willReturn([]);

        $this->skippedChange
            ->expects($this->once())
            ->method('getSkippedChange')
            ->willReturn(0);

        $result = $this->account->openInterestAccount($userId1);
        $this->assertInstanceOf(InterestAccount::class, $result);

        $this->expectException(Exception::class);
        $this->expectExceptionMessage('User already exists in the system.');
        $this->account->openInterestAccount($userId2);
    }


    public function testListAccountStatements()
    {
        $regularTransactions = [];
        $interestPayouts = [];

        $this->statements
            ->expects($this->once())
            ->method('getTransactions')
            ->willReturn($regularTransactions);

        $this->statements
            ->expects($this->once())
            ->method('getInterestPayouts')
            ->willReturn($interestPayouts);

        $result = $this->account->listAccountStatements();
        $this->assertIsArray($result);
    }

    public function testGenerateInterest()
    {
        $this->skippedChange
            ->expects($this->once())
            ->method('getSkippedChange')
            ->willReturn(10);

        $this->interestAccount
            ->expects($this->once())
            ->method('getAmount')
            ->willReturn(1000);

        $result = $this->account->generateInterest();
        $this->assertEquals(1010, $result);
    }
}
