<?php

namespace DarkGhostHunter\Transbanker\Facades;

use Illuminate\Support\Facades\Facade;
use DarkGhostHunter\TransbankApi\Transbank as TransbankAccessor;

class Transbank extends Facade
{
    /**
     * {@inheritDoc}
     */
    protected static function getFacadeAccessor()
    {
        return TransbankAccessor::class;
    }
}
