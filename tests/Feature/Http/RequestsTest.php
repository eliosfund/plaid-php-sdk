<?php

declare(strict_types=1);

use Plaid\Exceptions\PlaidException;
use Plaid\Plaid;
use Saloon\Config;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;

beforeEach(function () {
    Config::preventStrayRequests();
});

test('it will throw an exception on a failed request', function () {
    $mockClient = new MockClient([
        MockResponse::make([
            'error_message' => 'foo bar',
            'error_code' => 111,
        ], 401),
    ]);

    $connector = new Plaid('foo', 'bar');
    $connector->withMockClient($mockClient);
    $connector->auth()->get();
})->throws(PlaidException::class);
