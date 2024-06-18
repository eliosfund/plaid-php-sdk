<?php

declare(strict_types=1);

use Plaid\Http\Requests\Transactions;
use Plaid\Plaid;
use Saloon\Config;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;
use Saloon\Http\Response;

beforeEach(function () {
    Config::preventStrayRequests();

    $this->mockClient = new MockClient([
        Transactions\GetRequest::class => MockResponse::make([
            'data' => 'foo',
        ]),
        Transactions\RecurringGetRequest::class => MockResponse::make([
            'data' => 'foo',
        ]),
        Transactions\RefreshRequest::class => MockResponse::make([
            'data' => 'foo',
        ]),
        Transactions\SyncRequest::class => MockResponse::make([
            'data' => 'foo',
        ]),
    ]);

    $this->connector = new Plaid('foo', 'bar');
    $this->connector->withMockClient($this->mockClient);
});

test('it can get a transaction', function () {
    $response = $this->connector->transactions()->get();

    $data = $response->json();

    expect($response->status())->toEqual(200)
        ->and($response)->toBeInstanceOf(Response::class)
        ->and($data)->toEqual([
            'data' => 'foo',
        ]);

    $this->mockClient->assertSent(Transactions\GetRequest::class);
});

test('it can get recurring transactions', function () {
    $response = $this->connector->transactions()->recurringGet();

    $data = $response->json();

    expect($response->status())->toEqual(200)
        ->and($response)->toBeInstanceOf(Response::class)
        ->and($data)->toEqual([
            'data' => 'foo',
        ]);

    $this->mockClient->assertSent(Transactions\RecurringGetRequest::class);
});

test('it can refresh a transaction', function () {
    $response = $this->connector->transactions()->refresh();

    $data = $response->json();

    expect($response->status())->toEqual(200)
        ->and($response)->toBeInstanceOf(Response::class)
        ->and($data)->toEqual([
            'data' => 'foo',
        ]);

    $this->mockClient->assertSent(Transactions\RefreshRequest::class);
});

test('it can sync a transaction', function () {
    $response = $this->connector->transactions()->sync();

    $data = $response->json();

    expect($response->status())->toEqual(200)
        ->and($response)->toBeInstanceOf(Response::class)
        ->and($data)->toEqual([
            'data' => 'foo',
        ]);

    $this->mockClient->assertSent(Transactions\SyncRequest::class);
});
