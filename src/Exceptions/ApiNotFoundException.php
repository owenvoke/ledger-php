<?php

namespace pxgamer\Ledger\Exceptions;

/**
 * Class ApiNotFoundException
 */
class ApiNotFoundException extends \Exception
{
    /**
     * @var string
     */
    protected $message = 'This endpoint could not be found.';
}