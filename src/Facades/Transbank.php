<?php

namespace DarkGhostHunter\Transbanker\Facades;

use Illuminate\Support\Facades\Facade;
use DarkGhostHunter\TransbankApi\Transbank as TransbankAccessor;

/**
 * Class Transbank
 * @package DarkGhostHunter\Transbanker\Facades
 *
 * @method static isIntegration()
 * @method static isProduction()
 * @method static getEnvironment()
 * @method static setEnvironment(string $environment)
 * @method static getLogger()
 * @method static setLogger(\Psr\Log\LoggerInterface $logger)
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
