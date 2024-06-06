<?php

declare(strict_types=1);

namespace Plaid\Http\Resources;

use Plaid\Http\Requests\Link\AccessTokenInvalidateRequest;
use Plaid\Http\Requests\Link\PublicTokenExchangeRequest;
use Plaid\Http\Requests\Link\TokenCreateRequest;
use Plaid\Http\Requests\Link\TokenGetRequest;
use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;

class LinkResource extends BaseResource
{
    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function accessTokenInvalidate(array $data = []): Response
    {
        return $this->connector->send(new AccessTokenInvalidateRequest($data));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function publicTokenExchange(array $data = []): Response
    {
        return $this->connector->send(new PublicTokenExchangeRequest($data));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function tokenCreate(array $data = []): Response
    {
        return $this->connector->send(new TokenCreateRequest($data));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function tokenGet(array $data = []): Response
    {
        return $this->connector->send(new TokenGetRequest($data));
    }
}
