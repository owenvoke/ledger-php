<?php

namespace pxgamer\Ledger\Exceptions;

/**
 * Class InvalidHashException
 */
class InvalidHashException extends \Exception
{
    /**
     * @var string
     */
    protected $message = 'Invalid hash string.';
}
