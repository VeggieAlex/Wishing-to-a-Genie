<?php

/**
 * skippedPaymentInterface
 */
interface SkippedPaymentInterface
{
    /**
     * Get the skipped change amount.
     *
     * @return float
     */
    public function getSkippedChange(): float;
}
