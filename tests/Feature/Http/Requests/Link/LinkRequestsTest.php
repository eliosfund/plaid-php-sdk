<?php

declare(strict_types=1);

use Plaid\Http\Requests\Link;
use Plaid\Plaid;
use Saloon\Config;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;
use Saloon\Http\Response;

beforeEach(function () {
    Config::preventStrayRequests();

    $this->mockClient = new MockClient([
        Link\AccessTokenInvalidateRequest::class => MockResponse::make([
            'data' => 'foo',
        ]),
        Link\PublicTokenCreateRequest::class => MockResponse::make([
            'data' => 'foo',
        ]),
        Link\PublicTokenExchangeRequest::class => MockResponse::make([
            'data' => 'foo',
        ]),
        Link\PublicTokenGetRequest::class => MockResponse::make([
            'data' => 'foo',
        ]),
    ]);

    $this->connector = new Plaid('foo', 'bar');
    $this->connector->withMockClient($this->mockClient);
});

test('it can invalidate an access token', function () {
    $response = $this->connector->link()->accessTokenInvalidate();

    $data = $response->json();

    expect($response->status())->toEqual(200)
        ->and($response)->toBeInstanceOf(Response::class)
        ->and($data)->toEqual([
            'data' => 'foo',
        ]);

    $this->mockClient->assertSent(Link\AccessTokenInvalidateRequest::class);
});

test('it can create a public token', function () {
    $response = $this->connector->link()->publicTokenCreate();

    $data = $response->json();

    expect($response->status())->toEqual(200)
        ->and($response)->toBeInstanceOf(Response::class)
        ->and($data)->toEqual([
            'data' => 'foo',
        ]);

    $this->mockClient->assertSent(Link\PublicTokenCreateRequest::class);
});

test('it can exchange a public token', function () {
    $response = $this->connector->link()->publicTokenExchange();

    $data = $response->json();

    expect($response->status())->toEqual(200)
        ->and($response)->toBeInstanceOf(Response::class)
        ->and($data)->toEqual([
            'data' => 'foo',
        ]);

    $this->mockClient->assertSent(Link\PublicTokenExchangeRequest::class);
});

test('it can get a public token', function () {
    $response = $this->connector->link()->publicTokenGet();

    $data = $response->json();

    expect($response->status())->toEqual(200)
        ->and($response)->toBeInstanceOf(Response::class)
        ->and($data)->toEqual([
            'data' => 'foo',
        ]);

    $this->mockClient->assertSent(Link\PublicTokenGetRequest::class);
});
