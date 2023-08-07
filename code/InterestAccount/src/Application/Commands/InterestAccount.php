<?php

namespace src\Application\Commands;

use InterestAccountInterface;

class InterestAccount implements interestAccountInterface
{
    /**
     * @var UserId
     */
    private UserId $id;

    /**
     * @var float
     */
    private float $amount;

    /**
     * @var float
     */
    private float $interest;

    /**
     * @param UserId $id
     * @param float $amount
     * @param float $interest
     */
    public function __construct(UserId $id, float $amount, float $interest)
    {
        $this->id = $id;
        $this->amount = $amount;
        $this->interest = $interest;
    }

    /**
     * @return UserId
     */
    public function getId(): UserId
    {
        return $this->id;
    }

    /**
     * @param UserId $id
     */
    public function setId(UserId $id): void
    {
        $this->id = $id;
    }

    /**
     * @return float
     */
    public function getAmount(): float
    {
        return $this->amount;
    }

    /**
     * @param float $amount
     */
    public function setAmount(float $amount): void
    {
        $this->amount = $amount;
    }

    /**
     * @return float
     */
    public function getInterest(): float
    {
        return $this->interest;
    }

    /**
     * @param float $interest
     */
    public function setInterest(float $interest): void
    {
        $this->interest = $interest;
    }
}