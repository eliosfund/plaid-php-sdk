<?php

declare(strict_types=1);

namespace Plaid\Http\Resources;

use Plaid\Http\Requests\Transfer\AuthorizationCancelRequest;
use Plaid\Http\Requests\Transfer\AuthorizationCreateRequest;
use Plaid\Http\Requests\Transfer\CancelRequest;
use Plaid\Http\Requests\Transfer\CreateRequest;
use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;

class TransferResource extends BaseResource
{
    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function authorizationCancel(array $data = []): Response
    {
        return $this->connector->send(new AuthorizationCancelRequest($data));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function authorizationCreate(array $data = []): Response
    {
        return $this->connector->send(new AuthorizationCreateRequest($data));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function cancel(array $data = []): Response
    {
        return $this->connector->send(new CancelRequest($data));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function create(array $data = []): Response
    {
        return $this->connector->send(new CreateRequest($data));
    }
}
