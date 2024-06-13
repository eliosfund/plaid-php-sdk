<?php

declare(strict_types=1);

namespace Plaid\Http\Resources;

use Plaid\Http\Requests\Transactions\GetRequest;
use Plaid\Http\Requests\Transactions\RecurringGetRequest;
use Plaid\Http\Requests\Transactions\RefreshRequest;
use Plaid\Http\Requests\Transactions\SyncRequest;
use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;

class TransactionResource extends BaseResource
{
    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function sync(array $data = []): Response
    {
        return $this->connector->send(new SyncRequest($data));
    }

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
    public function recurringGet(array $data = []): Response
    {
        return $this->connector->send(new RecurringGetRequest($data));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function refresh(array $data = []): Response
    {
        return $this->connector->send(new RefreshRequest($data));
    }
}
