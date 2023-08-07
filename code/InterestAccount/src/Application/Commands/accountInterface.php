<?php


use Ramsey\Uuid\Uuid;

/**
 * accountInterface represents the interface for the account class.
 */
interface accountInterface
{
    /**
     * Opens an interest account for the specified user ID.
     *
     * @param UserId|Uuid $userId
     * @return InterestAccount
     * @throws \src\Interfaces\Exception
     */
    public function openInterestAccount(UserId|Uuid $userId): InterestAccount;

    /**
     * Deposits funds into the account.
     *
     * @param $amount
     * @return void
     */
    public function deposit($amount): void;

    /**
     * Calculate user's interest based on income.
     *
     * @param int $income
     * @return float
     */
    public function calculateInterest(int $income): float;

    /**
     * Generates interest for the account.
     *
     * @return float
     */
    public function generateInterest(): float;

    /**
     * Lists the account statements.
     *
     * @return array
     */
    public function listAccountStatements(): array;

    /**
     * Get user's income.
     *
     * @param Uuid $userId
     * @return int
     */
    public function getIncome(Uuid $userId): int;
}

