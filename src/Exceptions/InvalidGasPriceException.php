<?php

namespace pxgamer\Ledger\Exceptions;

/**
 * Class InvalidGasPriceException
 */
class InvalidGasPriceException extends \Exception
{
    /**
     * @var string
     */
    protected $message = 'Invalid gas price integer.';
}
