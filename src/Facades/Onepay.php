<?php

namespace DarkGhostHunter\Transbanker\Facades;

use Illuminate\Support\Facades\Facade;
use DarkGhostHunter\TransbankApi\Onepay as OnepayAccessor;

/**
 * Class Onepay
 * @package DarkGhostHunter\Transbanker\Facades
 *
 * @method \DarkGhostHunter\TransbankApi\Transactions\OnepayTransaction           makeCart(array $attributes = [])
 * @method \DarkGhostHunter\TransbankApi\Responses\OnepayResponse                 createCart(array $attributes = [])
 * @method \DarkGhostHunter\TransbankApi\Transactions\OnepayNullifyTransaction    makeNullify(array $attributes = [])
 * @method \DarkGhostHunter\TransbankApi\Responses\OnepayResponse                 createNullify(array $attributes = [])
 */
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
