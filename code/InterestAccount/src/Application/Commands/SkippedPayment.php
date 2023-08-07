<?php

namespace src\Application\Commands;

use SkippedPaymentInterface;

/**
 * SkippedPayment class
 */
class SkippedPayment implements skippedPaymentInterface
{
    private float $skippedChange;

    /**
     * @param float $skippedChange
     */
    public function __construct(float $skippedChange)
    {
        $this->skippedChange = $skippedChange;
    }

    /**
     * @return float
     */
    public function getSkippedChange(): float
    {
        return $this->skippedChange;
    }
}