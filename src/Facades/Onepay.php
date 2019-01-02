<?php

namespace DarkGhostHunter\Transbanker\Facades;

use Illuminate\Support\Facades\Facade;
use DarkGhostHunter\TransbankApi\Onepay as OnepayAccessor;

/**
 * Class Onepay
 * @package DarkGhostHunter\Transbanker\Facades
 *
 * @method static \DarkGhostHunter\TransbankApi\Transactions\OnepayTransaction           makeCart(array $attributes = [])
 * @method static \DarkGhostHunter\TransbankApi\Responses\OnepayResponse                 createCart(array $attributes = [])
 * @method static \DarkGhostHunter\TransbankApi\Transactions\OnepayNullifyTransaction    makeNullify(array $attributes = [])
 * @method static \DarkGhostHunter\TransbankApi\Responses\OnepayResponse                 createNullify(array $attributes = [])
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
