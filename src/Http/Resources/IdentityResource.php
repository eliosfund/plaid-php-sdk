<?php

declare(strict_types=1);

namespace Plaid\Http\Resources;

use Plaid\Http\Requests\Identity\GetRequest;
use Plaid\Http\Requests\Identity\MatchRequest;
use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;

class IdentityResource extends BaseResource
{
    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function get(array $data = []): Response
    {
        return $this->connector->send(new GetRequest($data));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function match(array $data = []): Response
    {
        return $this->connector->send(new MatchRequest($data));
    }
}
