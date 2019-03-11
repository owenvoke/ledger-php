<?php

namespace pxgamer\Ledger;

use PHPUnit\Framework\TestCase;

class EthereumLatestGasFeeTest extends TestCase
{
    /** @throws \Exception */
    public function testCanGetLatestGasFee(): void
    {
        $gasPrice = (new Ethereum\Transaction())->getCurrentFee();

        $this->assertInternalType('float', $gasPrice);
        $this->assertTrue($gasPrice > 0);
    }

    /** @throws \Exception */
    public function testCanGetCachedGasFee(): void
    {
        $gasPrice = (new Ethereum\Transaction())->getCurrentFee();

        $this->assertInternalType('float', $gasPrice);
        $this->assertTrue($gasPrice > 0);
    }
}
