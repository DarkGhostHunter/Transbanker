![
Sharon McCutcheon - Unsplash (UL) #-8a5eJ1-mmQ](https://images.unsplash.com/photo-1518458028785-8fbcd101ebb9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1280&h=400&q=80)

[![Latest Stable Version](https://poser.pugx.org/darkghosthunter/transbanker/v/stable)](https://packagist.org/packages/darkghosthunter/transbanker) [![License](https://poser.pugx.org/darkghosthunter/transbanker/license)](https://packagist.org/packages/darkghosthunter/transbanker)
![](https://img.shields.io/packagist/php-v/darkghosthunter/transbanker.svg)
[![Build Status](https://travis-ci.com/DarkGhostHunter/Transbanker.svg?branch=master)](https://travis-ci.com/DarkGhostHunter/Transbanker) [![Coverage Status](https://coveralls.io/repos/github/DarkGhostHunter/Transbanker/badge.svg?branch=master)](https://coveralls.io/github/DarkGhostHunter/Transbanker?branch=master) [![Maintainability](https://api.codeclimate.com/v1/badges/20d69b045d3c273d2e4d/maintainability)](https://codeclimate.com/github/DarkGhostHunter/Transbanker/maintainability) [![Test Coverage](https://api.codeclimate.com/v1/badges/20d69b045d3c273d2e4d/test_coverage)](https://codeclimate.com/github/DarkGhostHunter/Transbanker/test_coverage)

# Laravel Transbanker

**Transbank API connector for Laravel**

This package connects [Transbank API](https://github.com/DarkGhostHunter/TransbankApi/), a chilean payment gateway, to your Laravel Application.

## Installation

Call composer and require it into your application.

```bash
composer require darkghosthunter/transbanker
``` 

## Configuration

### Environment

By default, the package uses `integration` unless you explicitly set `production`, which will make all transactions real.

```dotenv
TRANSBANK_ENV=production
```

### Credentials

The `integration` environment sets testing credentials automatically, so you don't need to set them unless you want to overwrite one of them. 

Otherwise, in `production` environment, you will need to add your Transbank credentials for your services. 

For Webpay, **these must be located under `storage/app/transbank/webpay` as files**. You can overload the default `webpay.cert` that comes with this package with your own.

```dotenv
WEBPAY_COMMERCE_CODE=5000000001
WEBPAY_PRIVATE_KEY=private.key
WEBPAY_PUBLIC_CERT=public.cert
WEBPAY_CERT=webpay.cert
```

For Onepay, you can use the API key and Secret directly.

```dotenv
ONEPAY_API_KEY=dKVhq1WGt_XapIYirTXNyUKoWTDFfxaEV63-O5jcsdw
ONEPAY_SECRET="?XW#WOLG##FBAGEAYSNQ5APD#JF@$AYZ"
```

> If your secret has `#` characters, you may want to enclose it using double quotes `"`.

That is the basic configuration. If you need to fine tune this package, refer to the Advanced section.

## Redirection

This package registers the `transbank::webpay-redirect` for instant redirection to Webpay. When creating a Webpay Plus or Webpay Oneclick transaction, you can redirect the user instantly to the payment gateway in your controllers:

```php
<?

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DarkGhostHunter\Transbanker\Facades\Webpay;

class PaymentController extends Controller {
    
    /**
     * Creates a Payment
     * 
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function pay(Request $request)
    {
        // .. Validate Request, amount, etc..
        
        $response = Webpay::createNormal([
            'sessionId' => $request->session()->getId(),
            'buyOrder'  => 'myOrder#16548',
            'amount'    => 1000,
        ]);
        
        return view('transbanker::webpay-redirect', [
            'response' => $response            
        ]);
    }
    
}
```  

## Usage

For usage, check the [TransbankApi](https://github.com/DarkGhostHunter/transbank-api/wiki/) (Spanish, [English by Google Translate](https://translate.google.com/translate?hl=en&sl=es&tl=en&u=https%3A%2F%2Fgithub.com%2FDarkGhostHunter%2Ftransbank-api%2Fwiki%2F)). 

## Advanced

To fine tune Transbanker, just publish the config file:

```bash
php artisan vendor:publish --provider="DarkGhostHunter\Transbanker\TransbankerServiceProvider"
```

This will publish the `transbank.php` file in the `config` directory.

### Routes

This package with some default routes for your application (as configured inside `config/transbank.php`):

| Service | URL | Value |
|---|---|---|
| Webpay Plus | Return URL | `http://yourappurl.com/webpay/result` |
| Webpay Plus | Final URL | `http://yourappurl.com/webpay/receipt` |
| Webpay Plus | Mall Return URL | `http://yourappurl.com/webpay/mall/result` |
| Webpay Plus | Mall Final URL | `http://yourappurl.com/webpay/mall/receipt` |
| Webpay Oneclick | Response URL | `http://yourappurl.com/webpay/registration` |
| Onepay | Callback URL  | `http://yourappurl.com/onepay/result` |

You're free to change these URLs.

In any case, be sure to add your logic in these routes to receive Transbank http POST Requests, and remove the `csrf` middleware since Webpay will need to hit these routes so the payment cna proceed.

## License

This package is open-sourced software licensed under the MIT license.

`Redcompra`, `Webpay`, `Onepay`, `Patpass` and `tbk` are trademarks of [Transbank S.A.](https://www.transbank.cl/)

This package is not developed, approved, supported nor endorsed by Transbank S.A., nor by a natural person or company linked directly or indirectly by Transbank S.A.