<?php

namespace pxgamer\Ledger\Ethereum;

use pxgamer\Ledger\Exceptions\InvalidGasPriceException;

/**
 * Class Transaction
 */
class Transaction extends Ethereum
{
    /**
     * @var int
     */
    protected $gasPrice;

    /**
     * Return the current gas fee
     *
     * @throws \Exception
     */
    public function getCurrentFee()
    {
        $currentBlock = $this->client->get('fees');

        $json = \GuzzleHttp\json_decode($currentBlock->getBody(), true);

        $this->setGasFee($json['gas_price']);

        return $this->gasPrice;
    }

    /**
     * Return the latest cached Gas fee or falls back to current fee
     *
     * @return int
     * @throws \Exception
     */
    public function getCachedFee()
    {
        if ($this->gasPrice) {
            return $this->gasPrice;
        }

        return $this->getCurrentFee();
    }

    /**
     * @param string $gasPrice
     * @return mixed
     * @throws InvalidGasPriceException
     */
    private function setGasFee($gasPrice)
    {
        if (is_float($gasPrice)) {
            return $this->gasPrice = $gasPrice;
        }

        throw new InvalidGasPriceException();
    }
}
