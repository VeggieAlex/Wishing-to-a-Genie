<?php

/**
 * StatementInterface represents the interface for the Statement class.
 */
interface StatementInterface
{
    /**
     * Gets the amount on the statement.
     *
     * @return int
     */
    public function getAmount(): int;

    /**
     * Gets the transactions.
     *
     * @return array
     */
    public function getTransactions(): array;

    /**
     * Gets the interest payouts.
     *
     * @return array
     */
    public function getInterestPayouts(): array;
}
