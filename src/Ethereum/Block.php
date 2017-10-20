<?php

namespace pxgamer\Ledger\Ethereum;

use Illuminate\Support\Collection;
use pxgamer\Ledger\Exceptions\InvalidHashException;
use pxgamer\Ledger\Exceptions\InvalidHeightException;

/**
 * Class Block
 */
class Block extends Ethereum
{
    /**
     * @var string
     */
    protected $hash;
    /**
     * @var int
     */
    protected $height;
    /**
     * @var \DateTime
     */
    protected $time;
    /**
     * @var Collection
     */
    protected $transactions;

    /**
     * Get the latest block
     * @throws \Exception
     */
    public function getLatestBlock()
    {
        $currentBlock = $this->client->get('blocks/current');

        $json = \GuzzleHttp\json_decode($currentBlock->getBody(), true);

        $this->setHash($json['hash']);
        $this->setHeight($json['height']);
        $this->setDate($json['time']);
        $this->setTransactions($json['txs']);

        return $this;
    }

    /**
     * Return the block's hash
     *
     * @return string
     */
    public function hash()
    {
        return $this->hash;
    }

    /**
     * Return the block's date as a DateTime instance
     *
     * @return \DateTime
     */
    public function date()
    {
        return $this->time;
    }

    /**
     * Return the block's height
     *
     * @return int
     */
    public function height()
    {
        return $this->height;
    }

    /**
     * Return the transactions for this block
     *
     * @param bool $asTransactionInstances
     * @return Collection
     */
    public function transactions($asTransactionInstances = false)
    {
        if ($asTransactionInstances) {
            //
        }

        return $this->transactions;
    }

    /**
     * @param $hash
     * @return mixed
     * @throws InvalidHashException
     */
    private function setHash($hash)
    {
        if (preg_match('/0x[a-z0-9]{64}/', $hash)) {
            return $this->hash = $hash;
        }

        throw new InvalidHashException();
    }

    /**
     * @param $height
     * @return mixed
     * @throws InvalidHeightException
     */
    private function setHeight($height)
    {
        if (is_int($height)) {
            return $this->height = $height;
        }

        throw new InvalidHeightException();
    }

    /**
     * @param $time
     * @return \DateTime
     */
    private function setDate($time)
    {
        return $this->time = new \DateTime($time);
    }

    /**
     * @param $transactions
     * @return \DateTime
     */
    private function setTransactions($transactions)
    {
        return $this->transactions = collect($transactions);
    }
}