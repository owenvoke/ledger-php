<?php

use Illuminate\Support\Collection;
use PHPUnit\Framework\TestCase;
use pxgamer\Ledger\Ethereum\Block;

class EthereumLatestBlockTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testCanGetLatestBlock()
    {
        $block = (new Block)->getLatestBlock();

        $this->assertInstanceOf(Block::class, $block);
        $this->assertInstanceOf(Collection::class, $block->transactions());
        $this->assertRegExp('/0x[a-z0-9]{64}/', $block->hash());
        $this->assertTrue($block->height() > 0);
        $this->assertInstanceOf(DateTime::class, $block->date());
    }
}