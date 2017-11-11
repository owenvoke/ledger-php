<?php

namespace pxgamer\Ledger;

use PHPUnit\Framework\TestCase;

/**
 * Class EthereumLatestGasFeeTest
 */
class EthereumLatestGasFeeTest extends TestCase
{
    /**
     * @throws \Exception
     */
    public function testCanGetLatestGasFee()
    {
        $gasPrice = (new Ethereum\Transaction())->getCurrentFee();

        $this->assertInternalType('float', $gasPrice);
        $this->assertTrue($gasPrice > 0);
    }

    /**
     * @throws \Exception
     */
    public function testCanGetCachedGasFee()
    {
        $gasPrice = (new Ethereum\Transaction())->getCurrentFee();

        $this->assertInternalType('float', $gasPrice);
        $this->assertTrue($gasPrice > 0);
    }
}
