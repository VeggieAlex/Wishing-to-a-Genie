<?php

namespace src\Application\Commands;

use StatementInterface;

/**
 * Statement class
 */
class Statement implements statementInterface
{
    /**
     * Amount in decimal.
     */
    private int $amount;

    /**
     * @var array
     */
    private array $transactions;

    /**
     * @var array
     */
    private array $interestPayouts;

    /**
     * @param int $amount
     * @param array $transactions
     * @param array $interestPayouts
     */
    public function __construct(
        int $amount,
        array $transactions,
        array $interestPayouts
    )
    {
        $this->amount = $amount;
        $this->transactions = $transactions;
        $this->interestPayouts = $interestPayouts;

    }

    /**
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
    }

    /**
     * @return array
     */
    public function getTransactions(): array
    {
        return $this->transactions;
    }

    /**
     * @return array
     */
    public function getInterestPayouts(): array
    {
        return $this->interestPayouts;
    }
}