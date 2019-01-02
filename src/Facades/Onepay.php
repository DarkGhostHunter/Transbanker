<?php

namespace DarkGhostHunter\Transbanker\Facades;

use Illuminate\Support\Facades\Facade;
use DarkGhostHunter\TransbankApi\Onepay as OnepayAccessor;

class Onepay extends Facade
{
    /**
     * {@inheritDoc}
     */
    protected static function getFacadeAccessor()
    {
        return OnepayAccessor::class;
    }
}
