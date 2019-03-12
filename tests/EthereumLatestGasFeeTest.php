<?php

namespace pxgamer\Ledger;

use PHPUnit\Framework\TestCase;

class EthereumLatestGasFeeTest extends TestCase
{
    /** @throws \Exception */
    public function testCanGetLatestGasFee(): void
    {
        $gasPrice = (new Ethereum\Transaction())->getCurrentFee();

        $this->assertIsFloat($gasPrice);
        $this->assertGreaterThan(0, $gasPrice);
    }

    /** @throws \Exception */
    public function testCanGetCachedGasFee(): void
    {
        (new Ethereum\Transaction())->getCurrentFee();
        $gasPrice = (new Ethereum\Transaction())->getCachedFee();

        $this->assertIsFloat($gasPrice);
        $this->assertGreaterThan(0, $gasPrice);
    }
}
