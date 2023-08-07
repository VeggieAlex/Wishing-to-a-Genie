<?php

/**
 * interestAccountInterface represents the interface for the interestAccount class.
 */
interface InterestAccountInterface
{
    /**
     * Gets the ID of the interest account.
     *
     * @return UserId
     */
    public function getId(): UserId;

    /**
     * Sets the ID of the interest account.
     *
     * @param UserId $id
     * @return void
     */
    public function setId(UserId $id): void;

    /**
     * Gets the amount of the interest account.
     *
     * @return float
     */
    public function getAmount(): float;

    /**
     * Sets the amount of the interest account.
     *
     * @param float $amount
     * @return void
     */
    public function setAmount(float $amount): void;

    /**
     * Gets the interest rate of the interest account.
     *
     * @return float
     */
    public function getInterest(): float;

    /**
     * Sets the interest rate of the interest account.
     *
     * @param float $interest
     * @return void
     */
    public function setInterest(float $interest): void;
}
