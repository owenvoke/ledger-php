<?php

namespace pxgamer\Ledger;

use GuzzleHttp\Client;

class Connector
{
    /** @var Client */
    protected $client;

    /** @var string|null */
    protected $tokenType;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://api.ledgerwallet.com/blockchain/v2/' . $this->tokenType . '/'
        ]);
    }
}
