<?php

declare(strict_types=1);

namespace Plaid;

use Plaid\Http\Resources\TransferResource;
use Saloon\Contracts\Body\HasBody;
use Saloon\Http\Connector;
use Saloon\Traits\Body\HasJsonBody;
use Saloon\Traits\Plugins\AlwaysThrowOnErrors;
use Saloon\Traits\Plugins\HasTimeout;

class Plaid extends Connector implements HasBody
{
    use AlwaysThrowOnErrors;
    use HasJsonBody;
    use HasTimeout;

    protected int $connectTimeout = 60;

    protected int $requestTimeout = 120;

    public function __construct(protected readonly string $clientId, protected readonly string $clientSecret, protected readonly string $environment = 'production')
    {
        //
    }

    public function transfer(): TransferResource
    {
        return new TransferResource($this);
    }

    public function resolveBaseUrl(): string
    {
        return match ($this->environment) {
            'development' => 'https://development.plaid.com',
            'staging' => 'https://sandbox.plaid.com',
            default => 'https://production.plaid.com',
        };
    }

    protected function defaultBody(): array
    {
        return [
            'client_id' => $this->clientId,
            'secret' => $this->clientSecret,
        ];
    }

    protected function defaultHeaders(): array
    {
        return [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ];
    }
}
