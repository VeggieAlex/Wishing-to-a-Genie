<?php

/**
 * UserInterface represents the interface for the User class.
 */
interface UserInterface
{
    /**
     * Checks if the user has income information available.
     *
     * @return bool
     */
    public function hasIncomeInformation(): bool;

    /**
     * Gets the user's income per month.
     *
     * @return int
     */
    public function incomePerMonth(): int;

    /**
     * Gets the user's ID.
     *
     * @return UserId
     */
    public function id(): UserId;
}
