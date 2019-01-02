<?php

namespace DarkGhostHunter\Transbanker\Facades;

use Illuminate\Support\Facades\Facade;
use DarkGhostHunter\TransbankApi\Transbank as TransbankAccessor;

/**
 * Class Transbank
 * @package DarkGhostHunter\Transbanker\Facades
 *
 * @method isIntegration()
 * @method isProduction()
 * @method getEnvironment()
 * @method setEnvironment(string $environment)
 * @method getLogger()
 * @method setLogger(\Psr\Log\LoggerInterface $logger)
 */
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
