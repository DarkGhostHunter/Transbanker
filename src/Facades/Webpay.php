<?php

namespace DarkGhostHunter\Transbanker\Facades;

use Illuminate\Support\Facades\Facade;
use DarkGhostHunter\TransbankApi\Webpay as WebpayAccessor;

class Webpay extends Facade
{
    /**
     * {@inheritDoc}
     */
    protected static function getFacadeAccessor()
    {
        return WebpayAccessor::class;
    }
}
