<?php

declare(strict_types=1);

namespace Plaid\Http\Resources;

use Plaid\Http\Requests\Auth\BankTransferEventListRequest;
use Plaid\Http\Requests\Auth\BankTransferEventSyncRequest;
use Plaid\Http\Requests\Auth\GetRequest;
use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;

class AuthResource extends BaseResource
{
    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function bankTransferEventList(array $data = []): Response
    {
        return $this->connector->send(new BankTransferEventListRequest($data));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function bankTransferEventSync(array $data = []): Response
    {
        return $this->connector->send(new BankTransferEventSyncRequest($data));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function get(array $data = []): Response
    {
        return $this->connector->send(new GetRequest($data));
    }
}
