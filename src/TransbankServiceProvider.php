<?php

namespace DarkGhostHunter\Transbanker;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use DarkGhostHunter\TransbankApi\Transbank;

class TransbankServiceProvider extends BaseServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/transbank.php', 'transbank'
        );

        // Register the Transbank Configuration
        $this->app->singleton(Transbank::class, function ($app) {
            $transbank = new Transbank($app->make('logger'));

            $transbank->setEnvironment(
                $app->make('config')->get('transbank.environment')
            );

            $transbank->setCredentials('webpay', $this->mergeWebpayCredentials());
            $transbank->setCredentials('onepay', config('transbank.credentials.onepay'));

            return $transbank;
        });

        // Register the Webpay Service
        $this->app->singleton(Webpay::class, function ($app) {
            return $app->make(Transbank::class)->webpay();
        });

        // Register the Onepay Service
        $this->app->singleton(Onepay::class, function ($app) {
            return $app->make(Transbank::class)->onepay();
        });
    }

    /**
     * Merges the Webpay Config with the readable file credentials
     *
     * @return array
     */
    protected function mergeWebpayCredentials()
    {
        $array = config('transbank.credentials.webpay');

        return array_merge($array, [
            'privateKey' => $this->getWebpayCredential(array_get($array, 'privateKey')),
            'publicCert' => $this->getWebpayCredential(array_get($array, 'publicCert')),
        ]);
    }

    /**
     * Reads the credentials file contents
     *
     * @param string $file
     * @return bool|string
     */
    protected function getWebpayCredential(string $file)
    {
        return $this->app('file')->get(storage_path('transbank/webpay/' . $file));
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/transbank.php' => config_path('transbank.php'),
        ]);
    }

}
