<?php

declare(strict_types=1);

namespace Plaid;

use JsonException;
use Plaid\Exceptions\PlaidException;
use Plaid\Http\Resources\AuthResource;
use Plaid\Http\Resources\LinkResource;
use Plaid\Http\Resources\TransferResource;
use Saloon\Contracts\Body\HasBody;
use Saloon\Http\Connector;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;
use Saloon\Traits\Plugins\AlwaysThrowOnErrors;
use Saloon\Traits\Plugins\HasTimeout;
use Throwable;

class Plaid extends Connector implements HasBody
{
    use AlwaysThrowOnErrors;
    use HasJsonBody;
    use HasTimeout;

    protected int $connectTimeout = 60;

    protected int $requestTimeout = 120;

    public function __construct(
        protected readonly string $clientId,
        protected readonly string $clientSecret,
        protected readonly string $accessToken,
        protected readonly string $environment = 'production')
    {
        //
    }

    public function auth(): AuthResource
    {
        return new AuthResource($this);
    }

    public function link(): LinkResource
    {
        return new LinkResource($this);
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

    /**
     * @throws JsonException
     */
    public function getRequestException(Response $response, ?Throwable $senderException): ?Throwable
    {
        return PlaidException::fromPlaidError($response->json());
    }

    protected function defaultBody(): array
    {
        return [
            'client_id' => $this->clientId,
            'secret' => $this->clientSecret,
            'access_token' => $this->accessToken,
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
