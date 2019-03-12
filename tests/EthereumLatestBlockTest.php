<?php

namespace pxgamer\Ledger;

use DateTime;
use Illuminate\Support\Collection;
use PHPUnit\Framework\TestCase;

class EthereumLatestBlockTest extends TestCase
{
    /** @throws \Exception */
    public function testCanGetLatestBlock(): void
    {
        $block = (new Ethereum\Block())->getLatestBlock();

        $this->assertInstanceOf(Ethereum\Block::class, $block);
        $this->assertInstanceOf(Collection::class, $block->transactions());
        $this->assertRegExp('/0x[a-z0-9]{64}/', $block->hash());
        $this->assertGreaterThan(0, $block->height());
        $this->assertInstanceOf(DateTime::class, $block->date());
    }
}
