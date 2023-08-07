<?php

namespace Unit\Application\Commands;

use src\Application\Commands\SkippedPayment;
use PHPUnit\Framework\TestCase;

class SkippedPaymentTest extends TestCase
{

    public function testGetSkippedChange()
    {
        $skippedChange = .90;

        $skippedPayment = new SkippedPayment($skippedChange);

        $this->assertInstanceOf(SkippedPayment::class, $skippedPayment);
        $this->assertSame($skippedChange, $skippedPayment->getSkippedChange());
    }
}
