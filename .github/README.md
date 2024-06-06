# Plaid PHP SDK

A PHP package to help kickstart your next [Plaid](https://plaid.com) integration.

## Introduction

The Plaid PHP SDK is a PHP package that provides a simple and easy-to-use interface for interacting with the Plaid API.

### Auth Example
``` php
<?php

use Plaid\Plaid;

/**
 * The /auth/get endpoint returns the bank account and bank identification numbers (such as routing numbers, for US accounts) 
 * associated with an Item's checking and savings accounts, along with high-level account data and balances when available.
 * 
 * @docs https://plaid.com/docs/api/products/auth/#authget
 */
$plaid = new Plaid(env('PLAID_CLIENT_ID'), env('PLAID_SECRET'), env('PLAID_ACCESS_TOKEN'));

// Send the request
$response = $plaid->auth()->get();

// Transform the JSON response into an array
$data = $response->json();
```

### Promise Example
``` php
<?php

use Plaid\Http\Requests\Auth\GetRequest;
use Plaid\Plaid;

$plaid = new Plaid(env('PLAID_CLIENT_ID'), env('PLAID_SECRET'), env('PLAID_ACCESS_TOKEN'));
$promise = $forge->sendAsync(new GetRequest());

$promise
    ->then(function (Response $response) {
        // Handle successful response
    })
    ->otherwise(function (RequestException $exception) {
        // Handle failed request
    });
```

## Getting Started

You can install the package using [Composer](https://getcomposer.org):

```shell
composer require eliosfund/plaid-php-sdk
```

## Products Supported

Currently, the following Plaid products are supported:

- Auth
- Link
- Transfer

## Contributing

Please see [here](../.github/CONTRIBUTING.md) for more details about contributing.