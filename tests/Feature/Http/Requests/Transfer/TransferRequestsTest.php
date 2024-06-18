<?php

declare(strict_types=1);

use Plaid\Http\Requests\Transfer;
use Plaid\Plaid;
use Saloon\Config;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;
use Saloon\Http\Response;

beforeEach(function () {
    Config::preventStrayRequests();

    $this->mockClient = new MockClient([
        Transfer\AuthorizationCancelRequest::class => MockResponse::make([
            'data' => 'foo',
        ]),
        Transfer\AuthorizationCreateRequest::class => MockResponse::make([
            'data' => 'foo',
        ]),
        Transfer\CancelRequest::class => MockResponse::make([
            'data' => 'foo',
        ]),
        Transfer\CapabilitiesGetRequest::class => MockResponse::make([
            'data' => 'foo',
        ]),
        Transfer\CreateRequest::class => MockResponse::make([
            'data' => 'foo',
        ]),
        Transfer\EventListRequest::class => MockResponse::make([
            'data' => 'foo',
        ]),
        Transfer\EventSyncRequest::class => MockResponse::make([
            'data' => 'foo',
        ]),
        Transfer\GetRequest::class => MockResponse::make([
            'data' => 'foo',
        ]),
        Transfer\LedgerDepositRequest::class => MockResponse::make([
            'data' => 'foo',
        ]),
        Transfer\LedgerDistributeRequest::class => MockResponse::make([
            'data' => 'foo',
        ]),
        Transfer\LedgerGetRequest::class => MockResponse::make([
            'data' => 'foo',
        ]),
        Transfer\LedgerWithdrawRequest::class => MockResponse::make([
            'data' => 'foo',
        ]),
        Transfer\ListRequest::class => MockResponse::make([
            'data' => 'foo',
        ]),
        Transfer\SweepGetRequest::class => MockResponse::make([
            'data' => 'foo',
        ]),
        Transfer\SweepListRequest::class => MockResponse::make([
            'data' => 'foo',
        ]),
    ]);

    $this->connector = new Plaid('foo', 'bar');
    $this->connector->withMockClient($this->mockClient);
});

test('it can cancel an authorization', function () {
    $response = $this->connector->transfer()->authorizationCancel();

    $data = $response->json();

    expect($response->status())->toEqual(200)
        ->and($response)->toBeInstanceOf(Response::class)
        ->and($data)->toEqual([
            'data' => 'foo',
        ]);

    $this->mockClient->assertSent(Transfer\AuthorizationCancelRequest::class);
});

test('it can create an authorization', function () {
    $response = $this->connector->transfer()->authorizationCreate();

    $data = $response->json();

    expect($response->status())->toEqual(200)
        ->and($response)->toBeInstanceOf(Response::class)
        ->and($data)->toEqual([
            'data' => 'foo',
        ]);

    $this->mockClient->assertSent(Transfer\AuthorizationCreateRequest::class);
});

test('it can cancel a transfer', function () {
    $response = $this->connector->transfer()->cancel();

    $data = $response->json();

    expect($response->status())->toEqual(200)
        ->and($response)->toBeInstanceOf(Response::class)
        ->and($data)->toEqual([
            'data' => 'foo',
        ]);

    $this->mockClient->assertSent(Transfer\CancelRequest::class);
});

test('it can get transfer capabilities', function () {
    $response = $this->connector->transfer()->capabilitiesGet();

    $data = $response->json();

    expect($response->status())->toEqual(200)
        ->and($response)->toBeInstanceOf(Response::class)
        ->and($data)->toEqual([
            'data' => 'foo',
        ]);

    $this->mockClient->assertSent(Transfer\CapabilitiesGetRequest::class);
});

test('it can create a transfer', function () {
    $response = $this->connector->transfer()->create();

    $data = $response->json();

    expect($response->status())->toEqual(200)
        ->and($response)->toBeInstanceOf(Response::class)
        ->and($data)->toEqual([
            'data' => 'foo',
        ]);

    $this->mockClient->assertSent(Transfer\CreateRequest::class);
});

test('it can list transfer events', function () {
    $response = $this->connector->transfer()->eventList();

    $data = $response->json();

    expect($response->status())->toEqual(200)
        ->and($response)->toBeInstanceOf(Response::class)
        ->and($data)->toEqual([
            'data' => 'foo',
        ]);

    $this->mockClient->assertSent(Transfer\EventListRequest::class);
});

test('it can sync transfer events', function () {
    $response = $this->connector->transfer()->eventSync();

    $data = $response->json();

    expect($response->status())->toEqual(200)
        ->and($response)->toBeInstanceOf(Response::class)
        ->and($data)->toEqual([
            'data' => 'foo',
        ]);

    $this->mockClient->assertSent(Transfer\EventSyncRequest::class);
});

test('it can get a transfer', function () {
    $response = $this->connector->transfer()->get();

    $data = $response->json();

    expect($response->status())->toEqual(200)
        ->and($response)->toBeInstanceOf(Response::class)
        ->and($data)->toEqual([
            'data' => 'foo',
        ]);

    $this->mockClient->assertSent(Transfer\GetRequest::class);
});

test('it can deposit into the ledger', function () {
    $response = $this->connector->transfer()->ledgerDeposit();

    $data = $response->json();

    expect($response->status())->toEqual(200)
        ->and($response)->toBeInstanceOf(Response::class)
        ->and($data)->toEqual([
            'data' => 'foo',
        ]);

    $this->mockClient->assertSent(Transfer\LedgerDepositRequest::class);
});

test('it can distribute from the ledger', function () {
    $response = $this->connector->transfer()->ledgerDistribute();

    $data = $response->json();

    expect($response->status())->toEqual(200)
        ->and($response)->toBeInstanceOf(Response::class)
        ->and($data)->toEqual([
            'data' => 'foo',
        ]);

    $this->mockClient->assertSent(Transfer\LedgerDistributeRequest::class);
});

test('it can get the ledger', function () {
    $response = $this->connector->transfer()->ledgerGet();

    $data = $response->json();

    expect($response->status())->toEqual(200)
        ->and($response)->toBeInstanceOf(Response::class)
        ->and($data)->toEqual([
            'data' => 'foo',
        ]);

    $this->mockClient->assertSent(Transfer\LedgerGetRequest::class);
});

test('it can withdraw from the ledger', function () {
    $response = $this->connector->transfer()->ledgerWithdraw();

    $data = $response->json();

    expect($response->status())->toEqual(200)
        ->and($response)->toBeInstanceOf(Response::class)
        ->and($data)->toEqual([
            'data' => 'foo',
        ]);

    $this->mockClient->assertSent(Transfer\LedgerWithdrawRequest::class);
});

test('it can list transactions', function () {
    $response = $this->connector->transfer()->list();

    $data = $response->json();

    expect($response->status())->toEqual(200)
        ->and($response)->toBeInstanceOf(Response::class)
        ->and($data)->toEqual([
            'data' => 'foo',
        ]);

    $this->mockClient->assertSent(Transfer\ListRequest::class);
});

test('it can get sweeps', function () {
    $response = $this->connector->transfer()->sweepGet();

    $data = $response->json();

    expect($response->status())->toEqual(200)
        ->and($response)->toBeInstanceOf(Response::class)
        ->and($data)->toEqual([
            'data' => 'foo',
        ]);

    $this->mockClient->assertSent(Transfer\SweepGetRequest::class);
});

test('it can list sweeps', function () {
    $response = $this->connector->transfer()->sweepList();

    $data = $response->json();

    expect($response->status())->toEqual(200)
        ->and($response)->toBeInstanceOf(Response::class)
        ->and($data)->toEqual([
            'data' => 'foo',
        ]);

    $this->mockClient->assertSent(Transfer\SweepListRequest::class);
});
