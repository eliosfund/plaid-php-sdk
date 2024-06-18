<?php

declare(strict_types=1);

use Plaid\Exceptions\PlaidException;

it('sets the correct class properties', function () {
    $exception = PlaidException::fromPlaidError($error = [
        'error_message' => 'foo bar',
        'error_code' => 111,
        'documentation_url' => 'https://example.com',
        'request_id' => '123',
        'error_type' => 'foobar',
    ]);

    expect($exception->getMessage())
        ->toEqual('foo bar')
        ->and($exception->getCode())
        ->toEqual(111)
        ->and($exception->getDocumentationUrl())
        ->toEqual('https://example.com')
        ->and($exception->getResponse())
        ->toEqual($error)
        ->and($exception->getRequestId())
        ->toEqual('123')
        ->and($exception->getType())
        ->toEqual('foobar');
});
