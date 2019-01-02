<?php

namespace DarkGhostHunter\Transbanker;

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
