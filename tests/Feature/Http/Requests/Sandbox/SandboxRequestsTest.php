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
        Sandbox\ProcessorTokenCreateRequest::class => MockResponse::make([
            'data' => 'foo',
        ]),
        Sandbox\PublicTokenCreateRequest::class => MockResponse::make([
            'data' => 'foo',
        ]),
    ]);

    $this->connector = new Plaid('foo', 'bar');
    $this->connector->withMockClient($this->mockClient);
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
