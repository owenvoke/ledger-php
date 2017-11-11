<?php

namespace pxgamer\Ledger;

use GuzzleHttp\Client;

/**
 * Class Connector
 */
class Connector
{
    /**
     * @var Client
     */
    protected $client;

    /**
     * @var string|null
     */
    protected $tokenType;

    /**
     * Connector constructor.
     */
    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://api.ledgerwallet.com/blockchain/v2/' . $this->tokenType . '/'
        ]);
    }
}
