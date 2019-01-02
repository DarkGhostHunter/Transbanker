# Laravel Transbanker

**Transbank API connector for Laravel**

This package connects Transbank SDK (using the intermediary awesome [Transbank Api](https://github.com/DarkGhostHunter/transbank-api/wiki/)) to your Laravel Application.

## Installation

Call composer:

```bash
composer require darkghosthunter/laravel-transbanker
``` 

## Configuration

### Environment

By default, the package uses `integration` unless you explicitly set `production`, which will make all transactions real.

```dotenv
TRANSBANK_ENV=production
```

### Credentials

The `integration` environment sets testing credentials automatically, so you don't need to set them unless you want to overwrite them. 

Otherwise, in `production` environment, you will need to add your Transbank credentials for your services. 

For Webpay, these must be located under `storage/app/transbank/webpay` as files. You can overload the default `webpay.cert` that comes with this package with your own.

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

These settings can be overridden inside the `transbank.php` file inside your `config` folder.

## Usage

For usage, check the [TransbankApi](https://github.com/DarkGhostHunter/transbank-api/wiki/) (Spanish, [English by Google Translate](https://translate.google.com/translate?hl=en&sl=es&tl=en&u=https%3A%2F%2Fgithub.com%2FDarkGhostHunter%2Ftransbank-api%2Fwiki%2F)). 

## Routes

This package with some default routes for your application (as configured inside `config/transbank.php`):

| Service | URL | Value |
|---|---|---|
| Webpay Plus | Return URL | `http://yourappurl.com/webpay/result` |
| Webpay Plus | Final URL | `http://yourappurl.com/webpay/receipt` |
| Webpay Plus | Mall Return URL | `http://yourappurl.com/webpay/mall/result` |
| Webpay Plus | Mall Final URL | `http://yourappurl.com/webpay/mall/receipt` |
| Webpay Oneclick | Response URL | `http://yourappurl.com/webpay/registration` |
| Onepay | Callback URL  | `http://yourappurl.com/onepay/result` |

You're free to change these URL, but you will have to use your own logic to retrieve and confirm the result from Transbank using these URLs.

## License

This pacakge is open-sourced software licensed under the MIT license.

`Redcompra`, `Webpay`, `Onepay`, `Patpass` and `tbk` are trademarks of [Transbank S.A.](https://www.transbank.cl/)

This package is not developed, approved, supported nor endorsed by Transbank S.A., nor by a natural person or company linked directly or indirectly by Transbank S.A.