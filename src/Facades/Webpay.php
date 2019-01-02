<?php

namespace DarkGhostHunter\Transbanker;

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
