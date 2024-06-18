<?php

declare(strict_types=1);

use Plaid\Http\Requests\Auth;
use Plaid\Plaid;
use Saloon\Config;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;
use Saloon\Http\Response;

beforeEach(function () {
    Config::preventStrayRequests();

    $this->mockClient = new MockClient([
        Auth\BankTransferEventListRequest::class => MockResponse::make([
            'data' => 'foo',
        ]),
        Auth\BankTransferEventSyncRequest::class => MockResponse::make([
            'data' => 'foo',
        ]),
        Auth\GetRequest::class => MockResponse::make([
            'data' => 'foo',
        ]),
    ]);

    $this->connector = new Plaid('foo', 'bar');
    $this->connector->withMockClient($this->mockClient);
});

test('it can get bank transfer event list', function () {
    $response = $this->connector->auth()->bankTransferEventList();

    $data = $response->json();

    expect($response->status())->toEqual(200)
        ->and($response)->toBeInstanceOf(Response::class)
        ->and($data)->toEqual([
            'data' => 'foo',
        ]);

    $this->mockClient->assertSent(Auth\BankTransferEventListRequest::class);
});

test('it can get bank transfer event sync', function () {
    $response = $this->connector->auth()->bankTransferEventSync();

    $data = $response->json();

    expect($response->status())->toEqual(200)
        ->and($response)->toBeInstanceOf(Response::class)
        ->and($data)->toEqual([
            'data' => 'foo',
        ]);

    $this->mockClient->assertSent(Auth\BankTransferEventSyncRequest::class);
});

test('it can get auth data', function () {
    $response = $this->connector->auth()->get();

    $data = $response->json();

    expect($response->status())->toEqual(200)
        ->and($response)->toBeInstanceOf(Response::class)
        ->and($data)->toEqual([
            'data' => 'foo',
        ]);

    $this->mockClient->assertSent(Auth\GetRequest::class);
});
