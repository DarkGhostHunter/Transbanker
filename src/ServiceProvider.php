<?php

namespace DarkGhostHunter\Transbanker;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use DarkGhostHunter\TransbankApi\Onepay;
use DarkGhostHunter\TransbankApi\Webpay;
use DarkGhostHunter\TransbankApi\Transbank;

class ServiceProvider extends BaseServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/transbanker.php', 'transbank'
        );

        // Register the Transbank Configuration
        $this->app->singleton(Transbank::class, function ($app) {
            $transbank = new Transbank($app->make('log'));

            $transbank->setEnvironment(
                $app->make('config')->get('transbank.environment')
            );
            
            // Only load the certificates if the application has a valid commerce code to
            // make transactions. This is mandatory when the commerce must validate, so
            // the commerce will be on "integration" env but with valid certificates.
            if ($config->get('transbank.credentials.webpay.commerceCode')) {
                $transbank->setCredentials('webpay', $this->mergeWebpayCredentials($app));
            }

            // Load the production credentials for Onepay only on production environments.
            if ($transbank->isProduction()) {
                $transbank->setCredentials('onepay', config('transbank.credentials.onepay'));
            }

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

        $array = array_filter($array);

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
    protected function getWebpayCredential(string $file = null)
    {
        return file_get_contents(storage_path('transbank/webpay/' . $file));
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/transbanker.php' => config_path('transbanker.php'),
        ]);

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'transbanker');
    }

}
