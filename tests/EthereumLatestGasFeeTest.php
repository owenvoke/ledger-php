<?php

use PHPUnit\Framework\TestCase;
use pxgamer\Ledger\Ethereum\Transaction;

class EthereumLatestGasFeeTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testCanGetLatestGasFee()
    {
        $gasPrice = (new Transaction)->getCurrentFee();

        $this->assertInternalType('float', $gasPrice);
        $this->assertTrue($gasPrice > 0);
    }

    /**
     * @throws Exception
     */
    public function testCanGetCachedGasFee()
    {
        $gasPrice = (new Transaction)->getCurrentFee();

        $this->assertInternalType('float', $gasPrice);
        $this->assertTrue($gasPrice > 0);
    }
}