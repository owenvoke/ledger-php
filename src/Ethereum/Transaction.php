<?php

declare(strict_types=1);

namespace pxgamer\Ledger\Ethereum;

use pxgamer\Ledger\Exceptions\InvalidGasPriceException;

class Transaction extends Ethereum
{
    /** @var float */
    protected $gasPrice;

    /**
     * Return the current gas fee
     *
     * @throws \Exception
     */
    public function getCurrentFee(): float
    {
        $currentBlock = $this->client->get('fees');

        $json = \GuzzleHttp\json_decode($currentBlock->getBody(), true);

        $this->setGasFee($json['gas_price']);

        return $this->gasPrice;
    }

    /**
     * Return the latest cached Gas fee or falls back to current fee
     *
     * @return float
     * @throws \Exception
     */
    public function getCachedFee(): float
    {
        if ($this->gasPrice) {
            return $this->gasPrice;
        }

        return $this->getCurrentFee();
    }

    /**
     * @param float $gasPrice
     * @return float
     * @throws InvalidGasPriceException
     */
    private function setGasFee(?float $gasPrice): float
    {
        if (is_float($gasPrice)) {
            return $this->gasPrice = (float)$gasPrice;
        }

        throw new InvalidGasPriceException();
    }
}
