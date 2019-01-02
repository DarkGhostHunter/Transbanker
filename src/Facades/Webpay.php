<?php

namespace DarkGhostHunter\Transbanker\Facades;

use Illuminate\Support\Facades\Facade;
use DarkGhostHunter\TransbankApi\Webpay as WebpayAccessor;

/**
 * Class Webpay
 * @package DarkGhostHunter\Transbanker\Facades
 *
 * @method static \DarkGhostHunter\TransbankApi\Transactions\WebpayTransaction             makeNormal(array $attributes = [])
 * @method static \DarkGhostHunter\TransbankApi\Responses\WebpayPlusResponse               createNormal(array $attributes)
 * @method static \DarkGhostHunter\TransbankApi\Transactions\WebpayMallTransaction         makeMallNormal(array $attributes = [])
 * @method static \DarkGhostHunter\TransbankApi\Responses\WebpayPlusMallResponse           createMallNormal(array $attributes)
 * @method static \DarkGhostHunter\TransbankApi\Transactions\WebpayTransaction             makeDefer(array $attributes = [])
 * @method static \DarkGhostHunter\TransbankApi\Responses\WebpayPlusResponse               createDefer(array $attributes)
 * @method static \DarkGhostHunter\TransbankApi\Transactions\WebpayMallTransaction         makeMallDefer(array $attributes = [])
 * @method static \DarkGhostHunter\TransbankApi\Responses\WebpayPlusMallResponse           createMallDefer(array $attributes)
 * @method static \DarkGhostHunter\TransbankApi\Transactions\WebpayTransaction             makeCapture(array $attributes = [])
 * @method static \DarkGhostHunter\TransbankApi\Responses\WebpayPlusResponse               createCapture(array $attributes)
 * @method static \DarkGhostHunter\TransbankApi\Transactions\WebpayTransaction             makeMallCapture(array $attributes = [])
 * @method static \DarkGhostHunter\TransbankApi\Responses\WebpayPlusMallResponse           createMallCapture(array $attributes)
 * @method static \DarkGhostHunter\TransbankApi\Transactions\WebpayTransaction             makeNullify(array $attributes = [])
 * @method static \DarkGhostHunter\TransbankApi\Responses\WebpayPlusResponse               createNullify(array $attributes)
 * @method static \DarkGhostHunter\TransbankApi\Transactions\WebpayTransaction             makeRegistration(array $attributes = [])
 * @method static \DarkGhostHunter\TransbankApi\Responses\WebpayPlusResponse               createRegistration(array $attributes)
 * @method static \DarkGhostHunter\TransbankApi\Transactions\WebpayTransaction             makeUnregistration(array $attributes = [])
 * @method static \DarkGhostHunter\TransbankApi\Responses\WebpayOneclickResponse           createUnregistration(array $attributes)
 * @method static \DarkGhostHunter\TransbankApi\Transactions\WebpayTransaction             makeCharge(array $attributes = [])
 * @method static \DarkGhostHunter\TransbankApi\Responses\WebpayOneclickResponse           createCharge(array $attributes)
 * @method static \DarkGhostHunter\TransbankApi\Transactions\WebpayTransaction             makeReverseCharge(array $attributes = [])
 * @method static \DarkGhostHunter\TransbankApi\Responses\WebpayOneclickResponse           createReverseCharge(array $attributes)
 * @method static \DarkGhostHunter\TransbankApi\Transactions\WebpayMallTransaction         makeMallCharge(array $attributes = [])
 * @method static \DarkGhostHunter\TransbankApi\Responses\WebpayOneclickResponse           createMallCharge(array $attributes)
 * @method static \DarkGhostHunter\TransbankApi\Transactions\WebpayMallTransaction         makeMallReverseCharge(array $attributes = [])
 * @method static \DarkGhostHunter\TransbankApi\Responses\WebpayOneclickResponse           createMallReverseCharge(array $attributes)
 * @method static \DarkGhostHunter\TransbankApi\Transactions\WebpayMallTransaction         makeMallNullify(array $attributes = [])
 * @method static \DarkGhostHunter\TransbankApi\Responses\WebpayOneclickResponse           createMallNullify(array $attributes)
 * @method static \DarkGhostHunter\TransbankApi\Transactions\WebpayMallTransaction         makeMallReverseNullify(array $attributes = [])
 * @method static \DarkGhostHunter\TransbankApi\Responses\WebpayPlusResponse               createMallReverseNullify(array $attributes)
 *
 * @method static \DarkGhostHunter\TransbankApi\Responses\WebpayPlusMallResponse|\DarkGhostHunter\TransbankApi\Responses\WebpayPlusResponse    getDefer(string $transaction)
 * @method static \DarkGhostHunter\TransbankApi\Responses\WebpayPlusMallResponse|\DarkGhostHunter\TransbankApi\Responses\WebpayPlusResponse    retrieveDefer(string $transaction)
 * @method static \DarkGhostHunter\TransbankApi\Responses\WebpayPlusResponse               confirmDefer(string $transaction)
 * @method static \DarkGhostHunter\TransbankApi\Responses\WebpayPlusResponse               confirmRegistration
 *
 * @method static \DarkGhostHunter\TransbankApi\Responses\WebpayPlusResponse               getNormal(string $transaction)
 * @method static \DarkGhostHunter\TransbankApi\Responses\WebpayPlusResponse               retrieveNormal(string $transaction)
 * @method static bool                                                                     confirmNormal(string $transaction)
 *
 * @method static \DarkGhostHunter\TransbankApi\Responses\WebpayPlusMallResponse           getMallNormal(string $transaction)
 * @method static \DarkGhostHunter\TransbankApi\Responses\WebpayPlusMallResponse           retrieveMallNormal(string $transaction)
 * @method static bool                                                                     confirmMallNormal(string $transaction)
 *
 * @method static \DarkGhostHunter\TransbankApi\Responses\WebpayPlusResponse               getRegistration(string $transaction)
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
