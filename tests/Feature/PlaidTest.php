<?php

use Plaid\Environment;
use Plaid\Plaid;
use Saloon\Http\Faking\MockResponse;

test('it will resolve the default base url', function () {
    $connection = new Plaid('foo', 'bar', 'foobar');

    expect($connection->resolveBaseUrl())->toEqual('https://production.plaid.com');
});

test('it will resolve the sandbox url', function () {
    $connection = new Plaid('foo', 'bar', 'foobar', Environment::SANDBOX);

    expect($connection->resolveBaseUrl())->toEqual('https://sandbox.plaid.com');
});

test('it will resolve the development url', function () {
    $connection = new Plaid('foo', 'bar', 'foobar', Environment::DEVELOPMENT);

    expect($connection->resolveBaseUrl())->toEqual('https://development.plaid.com');
});

test('it will set the default body', function () {
    $connection = new Plaid('foo', 'bar', 'foobar');

    expect($connection->body()->all())
        ->toBeArray()
        ->toMatchArray([
            'client_id' => 'foo',
            'secret' => 'bar',
            'access_token' => 'foobar',
        ]);
});

test('it will set the correct headers', function () {
    $connection = new Plaid('foo', 'bar', 'foobar');

    expect($connection->headers()->all())
        ->toBeArray()
        ->toMatchArray([
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ]);
});
