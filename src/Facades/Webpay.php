<?php

namespace DarkGhostHunter\Transbanker\Facades;

use Illuminate\Support\Facades\Facade;
use DarkGhostHunter\TransbankApi\Webpay as WebpayAccessor;

/**
 * Class Webpay
 * @package DarkGhostHunter\Transbanker\Facades
 *
 * @method \DarkGhostHunter\TransbankApi\Transactions\WebpayTransaction       makeNormal(array $attributes = [])
 * @method \DarkGhostHunter\TransbankApi\Responses\WebpayPlusResponse         createNormal(array $attributes)
 * @method \DarkGhostHunter\TransbankApi\Transactions\WebpayMallTransaction   makeMallNormal(array $attributes = [])
 * @method \DarkGhostHunter\TransbankApi\Responses\WebpayPlusMallResponse         createMallNormal(array $attributes)
 * @method \DarkGhostHunter\TransbankApi\Transactions\WebpayTransaction       makeDefer(array $attributes = [])
 * @method \DarkGhostHunter\TransbankApi\Responses\WebpayPlusResponse             createDefer(array $attributes)
 * @method \DarkGhostHunter\TransbankApi\Transactions\WebpayMallTransaction   makeMallDefer(array $attributes = [])
 * @method \DarkGhostHunter\TransbankApi\Responses\WebpayPlusMallResponse         createMallDefer(array $attributes)
 * @method \DarkGhostHunter\TransbankApi\Transactions\WebpayTransaction       makeCapture(array $attributes = [])
 * @method \DarkGhostHunter\TransbankApi\Responses\WebpayPlusResponse             createCapture(array $attributes)
 * @method \DarkGhostHunter\TransbankApi\Transactions\WebpayTransaction       makeMallCapture(array $attributes = [])
 * @method \DarkGhostHunter\TransbankApi\Responses\WebpayPlusMallResponse         createMallCapture(array $attributes)
 * @method \DarkGhostHunter\TransbankApi\Transactions\WebpayTransaction       makeNullify(array $attributes = [])
 * @method \DarkGhostHunter\TransbankApi\Responses\WebpayPlusResponse             createNullify(array $attributes)
 * @method \DarkGhostHunter\TransbankApi\Transactions\WebpayTransaction       makeRegistration(array $attributes = [])
 * @method \DarkGhostHunter\TransbankApi\Responses\WebpayPlusResponse             createRegistration(array $attributes)
 * @method \DarkGhostHunter\TransbankApi\Transactions\WebpayTransaction       makeUnregistration(array $attributes = [])
 * @method \DarkGhostHunter\TransbankApi\Responses\WebpayOneclickResponse         createUnregistration(array $attributes)
 * @method \DarkGhostHunter\TransbankApi\Transactions\WebpayTransaction       makeCharge(array $attributes = [])
 * @method \DarkGhostHunter\TransbankApi\Responses\WebpayOneclickResponse         createCharge(array $attributes)
 * @method \DarkGhostHunter\TransbankApi\Transactions\WebpayTransaction       makeReverseCharge(array $attributes = [])
 * @method \DarkGhostHunter\TransbankApi\Responses\WebpayOneclickResponse         createReverseCharge(array $attributes)
 * @method \DarkGhostHunter\TransbankApi\Transactions\WebpayMallTransaction   makeMallCharge(array $attributes = [])
 * @method \DarkGhostHunter\TransbankApi\Responses\WebpayOneclickResponse         createMallCharge(array $attributes)
 * @method \DarkGhostHunter\TransbankApi\Transactions\WebpayMallTransaction   makeMallReverseCharge(array $attributes = [])
 * @method \DarkGhostHunter\TransbankApi\Responses\WebpayOneclickResponse         createMallReverseCharge(array $attributes)
 * @method \DarkGhostHunter\TransbankApi\Transactions\WebpayMallTransaction   makeMallNullify(array $attributes = [])
 * @method \DarkGhostHunter\TransbankApi\Responses\WebpayOneclickResponse         createMallNullify(array $attributes)
 * @method \DarkGhostHunter\TransbankApi\Transactions\WebpayMallTransaction   makeMallReverseNullify(array $attributes = [])
 * @method \DarkGhostHunter\TransbankApi\Responses\WebpayPlusResponse             createMallReverseNullify(array $attributes)
 *
 * @method \DarkGhostHunter\TransbankApi\Responses\WebpayPlusMallResponse|\DarkGhostHunter\TransbankApi\Responses\WebpayPlusResponse    getDefer(string $transaction)
 * @method \DarkGhostHunter\TransbankApi\Responses\WebpayPlusMallResponse|\DarkGhostHunter\TransbankApi\Responses\WebpayPlusResponse    retrieveDefer(string $transaction)
 * @method \DarkGhostHunter\TransbankApi\Responses\WebpayPlusResponse                           confirmDefer(string $transaction)
 * @method \DarkGhostHunter\TransbankApi\Responses\WebpayPlusResponse                           confirmRegistration
 *
 * @method \DarkGhostHunter\TransbankApi\Responses\WebpayPlusResponse       getNormal(string $transaction)
 * @method \DarkGhostHunter\TransbankApi\Responses\WebpayPlusResponse       retrieveNormal(string $transaction)
 * @method bool                     confirmNormal(string $transaction)
 *
 * @method \DarkGhostHunter\TransbankApi\Responses\WebpayPlusMallResponse   getMallNormal(string $transaction)
 * @method \DarkGhostHunter\TransbankApi\Responses\WebpayPlusMallResponse   retrieveMallNormal(string $transaction)
 * @method bool                     confirmMallNormal(string $transaction)
 *
 * @method \DarkGhostHunter\TransbankApi\Responses\WebpayPlusResponse       getRegistration(string $transaction)
 */
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
