<?php

namespace Tests\Unit;

use DarkGhostHunter\TransbankApi\Responses\WebpayOneclickResponse;
use DarkGhostHunter\TransbankApi\Responses\WebpayPlusResponse;
use Orchestra\Testbench\TestCase;

class ViewTest extends TestCase
{

    protected function getPackageProviders($app)
    {
        return [
            'DarkGhostHunter\Transbanker\TransbankerServiceProvider'
        ];
    }

    public function testViewReceivesPlusResponse()
    {
        $response = new WebpayPlusResponse([
            'token' => 'test-token',
            'url' => 'test-url'
        ]);

        /** @var \Illuminate\Contracts\View\Factory $viewFactory */
        $viewFactory = $this->app->make(\Illuminate\Contracts\View\Factory::class);

        $render = $viewFactory->make('transbanker::webpay-redirect', [
            'response' => $response
        ], [])->render();

        $this->assertStringContainsString('test-token', $render);
        $this->assertStringContainsString('test-url', $render);
        $this->assertStringContainsString('token_ws', $render);

    }

    public function testViewReceivesOneclickResponse()
    {
        $response = new WebpayOneclickResponse([
            'token' => 'test-token',
            'urlWebpay' => 'test-url'
        ]);

        /** @var \Illuminate\Contracts\View\Factory $viewFactory */
        $viewFactory = $this->app->make(\Illuminate\Contracts\View\Factory::class);

        $render = $viewFactory->make('transbanker::webpay-redirect', [
            'response' => $response
        ], [])->render();

        $this->assertStringContainsString('test-token', $render);
        $this->assertStringContainsString('test-url', $render);
        $this->assertStringContainsString('TBK_TOKEN', $render);
    }
}
