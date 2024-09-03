<?php

declare(strict_types=1);

use Plaid\Http\Requests\Sandbox;
use Plaid\Plaid;
use Saloon\Config;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;
use Saloon\Http\Response;

beforeEach(function () {
    Config::preventStrayRequests();

    $this->mockClient = new MockClient([
        Sandbox\IncomeFireWebhook::class => MockResponse::make([
            'data' => 'foo',
        ]),
        Sandbox\ItemFireWebhook::class => MockResponse::make([
            'data' => 'foo',
        ]),
        Sandbox\ProcessorTokenCreateRequest::class => MockResponse::make([
            'data' => 'foo',
        ]),
        Sandbox\PublicTokenCreateRequest::class => MockResponse::make([
            'data' => 'foo',
        ]),
        Sandbox\TransferFireWebhook::class => MockResponse::make([
            'data' => 'foo',
        ]),
        Sandbox\TransferRefundSimulate::class => MockResponse::make([
            'data' => 'foo',
        ]),
        Sandbox\TransferSimulate::class => MockResponse::make([
            'data' => 'foo',
        ]),
        Sandbox\TransferSweepSimulate::class => MockResponse::make([
            'data' => 'foo',
        ]),
        Sandbox\TransferTestClockAdvance::class => MockResponse::make([
            'data' => 'foo',
        ]),
        Sandbox\TransferTestClockCreate::class => MockResponse::make([
            'data' => 'foo',
        ]),
        Sandbox\TransferTestClockGet::class => MockResponse::make([
            'data' => 'foo',
        ]),
        Sandbox\TransferTestClockList::class => MockResponse::make([
            'data' => 'foo',
        ]),
    ]);

    $this->connector = new Plaid('foo', 'bar');
    $this->connector->withMockClient($this->mockClient);
});

test('it can fire an income webhook', function () {
    $response = $this->connector->sandbox()->incomeFireWebhook();

    $data = $response->json();

    expect($response->status())->toEqual(200)
        ->and($response)->toBeInstanceOf(Response::class)
        ->and($data)->toEqual([
            'data' => 'foo',
        ]);

    $this->mockClient->assertSent(Sandbox\IncomeFireWebhook::class);
});

test('it can fire an item webhook', function () {
    $response = $this->connector->sandbox()->itemFireWebhook();

    $data = $response->json();

    expect($response->status())->toEqual(200)
        ->and($response)->toBeInstanceOf(Response::class)
        ->and($data)->toEqual([
            'data' => 'foo',
        ]);

    $this->mockClient->assertSent(Sandbox\ItemFireWebhook::class);
});

test('it can create a processor token', function () {
    $response = $this->connector->sandbox()->processorTokenCreate();

    $data = $response->json();

    expect($response->status())->toEqual(200)
        ->and($response)->toBeInstanceOf(Response::class)
        ->and($data)->toEqual([
            'data' => 'foo',
        ]);

    $this->mockClient->assertSent(Sandbox\ProcessorTokenCreateRequest::class);
});

test('it can create a public token', function () {
    $response = $this->connector->sandbox()->publicTokenCreate();

    $data = $response->json();

    expect($response->status())->toEqual(200)
        ->and($response)->toBeInstanceOf(Response::class)
        ->and($data)->toEqual([
            'data' => 'foo',
        ]);

    $this->mockClient->assertSent(Sandbox\PublicTokenCreateRequest::class);
});

test('it can fire a transfer webhook', function () {
    $response = $this->connector->sandbox()->transferFireWebhook();

    $data = $response->json();

    expect($response->status())->toEqual(200)
        ->and($response)->toBeInstanceOf(Response::class)
        ->and($data)->toEqual([
            'data' => 'foo',
        ]);

    $this->mockClient->assertSent(Sandbox\TransferFireWebhook::class);
});

test('it can simulate a transfer refund', function () {
    $response = $this->connector->sandbox()->transferRefundSimulate();

    $data = $response->json();

    expect($response->status())->toEqual(200)
        ->and($response)->toBeInstanceOf(Response::class)
        ->and($data)->toEqual([
            'data' => 'foo',
        ]);

    $this->mockClient->assertSent(Sandbox\TransferRefundSimulate::class);
});

test('it can simulate a transfer event', function () {
    $response = $this->connector->sandbox()->transferSimulate();

    $data = $response->json();

    expect($response->status())->toEqual(200)
        ->and($response)->toBeInstanceOf(Response::class)
        ->and($data)->toEqual([
            'data' => 'foo',
        ]);

    $this->mockClient->assertSent(Sandbox\TransferSimulate::class);
});

test('it can simulate a transfer sweep', function () {
    $response = $this->connector->sandbox()->transferSweepSimulate();

    $data = $response->json();

    expect($response->status())->toEqual(200)
        ->and($response)->toBeInstanceOf(Response::class)
        ->and($data)->toEqual([
            'data' => 'foo',
        ]);

    $this->mockClient->assertSent(Sandbox\TransferSweepSimulate::class);
});

test('it can advance a transfer test clock', function () {
    $response = $this->connector->sandbox()->transferTestClockAdvance();

    $data = $response->json();

    expect($response->status())->toEqual(200)
        ->and($response)->toBeInstanceOf(Response::class)
        ->and($data)->toEqual([
            'data' => 'foo',
        ]);

    $this->mockClient->assertSent(Sandbox\TransferTestClockAdvance::class);
});

test('it can create a transfer test clock', function () {
    $response = $this->connector->sandbox()->transferTestClockCreate();

    $data = $response->json();

    expect($response->status())->toEqual(200)
        ->and($response)->toBeInstanceOf(Response::class)
        ->and($data)->toEqual([
            'data' => 'foo',
        ]);

    $this->mockClient->assertSent(Sandbox\TransferTestClockCreate::class);
});

test('it can get a transfer test clock', function () {
    $response = $this->connector->sandbox()->transferTestClockGet();

    $data = $response->json();

    expect($response->status())->toEqual(200)
        ->and($response)->toBeInstanceOf(Response::class)
        ->and($data)->toEqual([
            'data' => 'foo',
        ]);

    $this->mockClient->assertSent(Sandbox\TransferTestClockGet::class);
});

test('it can list transfer test clocks', function () {
    $response = $this->connector->sandbox()->transferTestClockList();

    $data = $response->json();

    expect($response->status())->toEqual(200)
        ->and($response)->toBeInstanceOf(Response::class)
        ->and($data)->toEqual([
            'data' => 'foo',
        ]);

    $this->mockClient->assertSent(Sandbox\TransferTestClockList::class);
});
