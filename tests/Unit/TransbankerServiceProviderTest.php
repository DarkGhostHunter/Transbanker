<?php

namespace Tests\Unit;

use DarkGhostHunter\TransbankApi\Onepay;
use DarkGhostHunter\TransbankApi\Transbank;
use DarkGhostHunter\TransbankApi\Webpay;
use Illuminate\Contracts\Http\Kernel;
use Orchestra\Testbench\TestCase;

class TransbankerServiceProviderTest extends TestCase
{

    protected function getPackageProviders($app)
    {
        return [
            'DarkGhostHunter\Transbanker\TransbankerServiceProvider'
        ];
    }

    public function testReceivesDefaultConfig()
    {
        $this->assertEquals(
            include __DIR__ . '/../../config/transbanker.php',
            $this->app['config']['transbank']
        );
    }

    public function testPublishesConfigFile()
    {
        $this->artisan('vendor:publish', [
            '--provider' => 'DarkGhostHunter\Transbanker\TransbankerServiceProvider'
        ]);

        $this->assertFileExists(config_path('transbanker.php'));
        $this->assertFileIsReadable(config_path('transbanker.php'));
        $this->assertFileEquals(config_path('transbanker.php'), __DIR__ . '/../../config/transbanker.php');
        $this->assertTrue(unlink(config_path('transbanker.php')));
    }

    public function testRegisterServices()
    {
        $this->assertFalse($this->app->isDeferredService(Transbank::class));
        $this->assertFalse($this->app->resolved(Transbank::class));
        $this->assertFalse($this->app->resolved(Webpay::class));
        $this->assertFalse($this->app->resolved(Onepay::class));

        $transbank = $this->app->make(Transbank::class);
        $this->assertInstanceOf(Transbank::class, $transbank);

        $webpay = $this->app->make(Webpay::class);
        $this->assertInstanceOf(Webpay::class, $webpay);

        $onepay = $this->app->make(Onepay::class);
        $this->assertInstanceOf(Onepay::class, $onepay);

        $this->assertTrue($this->app->resolved(Transbank::class));
        $this->assertTrue($this->app->resolved(Webpay::class));
        $this->assertTrue($this->app->resolved(Onepay::class));
    }

    public function testTransbankReadsCertificatesOnProduction()
    {
        $privateKey = 'privateKey.crt';
        $publicCert = 'publicCert.crt';

        if (file_exists(storage_path('transbank/webpay/' . $privateKey))) {
            unlink(storage_path('transbank/webpay/' . $privateKey));
        }

        if (file_exists(storage_path('transbank/webpay/' . $publicCert))) {
            unlink(storage_path('transbank/webpay/' . $publicCert));
        }

        if (file_exists(storage_path('transbank/webpay/'))) {
            rmdir(storage_path('transbank/webpay/'));
        }

        mkdir(storage_path('transbank/webpay/'), 0777, true);

        touch(storage_path('transbank/webpay/' . $privateKey));
        file_put_contents(storage_path('transbank/webpay/' . $privateKey), 'foo');
        touch(storage_path('transbank/webpay/' . $publicCert));
        file_put_contents(storage_path('transbank/webpay/' . $publicCert), 'bar');

        $this->app->make('config')->set('transbank.environment', 'production');
        $this->app->make('config')->set('transbank.credentials.webpay.commerceCode', 'baz');

        /** @var Transbank $transbank */
        $transbank = $this->app->make(Transbank::class);

        $this->assertInstanceOf(Transbank::class, $transbank);
        $this->assertEquals('foo', $transbank->getCredentials('webpay')->privateKey);
        $this->assertEquals('bar', $transbank->getCredentials('webpay')->publicCert);
        $this->assertEquals('baz', $transbank->getCredentials('webpay')->commerceCode);

        unlink(storage_path('transbank/webpay/' . $privateKey));
        unlink(storage_path('transbank/webpay/' . $publicCert));
        rmdir(storage_path('transbank/webpay/'));
    }

    public function testRegisterFacades()
    {
        $this->assertFalse($this->app->resolved(Transbank::class));
        $this->assertFalse($this->app->resolved(Webpay::class));
        $this->assertFalse($this->app->resolved(Onepay::class));

        $this->assertInstanceOf(
            Transbank::class,
            \DarkGhostHunter\Transbanker\Facades\Transbank::getFacadeRoot()
        );

        $this->assertInstanceOf(
            Webpay::class,
            \DarkGhostHunter\Transbanker\Facades\Webpay::getFacadeRoot()
        );

        $this->assertInstanceOf(
            Onepay::class,
            \DarkGhostHunter\Transbanker\Facades\Onepay::getFacadeRoot()
        );

        $this->assertTrue($this->app->resolved(Transbank::class));
        $this->assertTrue($this->app->resolved(Webpay::class));
        $this->assertTrue($this->app->resolved(Onepay::class));
    }

    public function testReceivesAppLogger()
    {
        /** @var Transbank $transbank */
        $transbank = $this->app->make(Transbank::class);

        $logger = $this->app->make('log');

        $this->assertEquals($transbank->getLogger(), $logger);
    }
}
