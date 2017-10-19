<?php

use pxgamer\Ledger\Ethereum\Block;

class EthereumLatestBlockTest
{
    public function testCanGetLatestBlock()
    {
        $block = Block::getLatestBlock();
    }
}