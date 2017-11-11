<?php

namespace pxgamer\Ledger\Ethereum;

use pxgamer\Ledger\Connector;

/**
 * Class Ethereum
 */
class Ethereum extends Connector
{
    protected $tokenType = 'eth';

    /**
     * @return string
     */
    protected function getTokenType()
    {
        return $this->tokenType;
    }
}
