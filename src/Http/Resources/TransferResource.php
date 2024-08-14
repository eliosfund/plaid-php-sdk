<?php

declare(strict_types=1);

namespace Plaid\Http\Resources;

use Plaid\Http\Requests\Transfer\AuthorizationCancelRequest;
use Plaid\Http\Requests\Transfer\AuthorizationCreateRequest;
use Plaid\Http\Requests\Transfer\CancelRequest;
use Plaid\Http\Requests\Transfer\CapabilitiesGetRequest;
use Plaid\Http\Requests\Transfer\CreateRequest;
use Plaid\Http\Requests\Transfer\EventListRequest;
use Plaid\Http\Requests\Transfer\EventSyncRequest;
use Plaid\Http\Requests\Transfer\GetRequest;
use Plaid\Http\Requests\Transfer\IntentCreateRequest;
use Plaid\Http\Requests\Transfer\IntentGetRequest;
use Plaid\Http\Requests\Transfer\LedgerDepositRequest;
use Plaid\Http\Requests\Transfer\LedgerDistributeRequest;
use Plaid\Http\Requests\Transfer\LedgerGetRequest;
use Plaid\Http\Requests\Transfer\LedgerWithdrawRequest;
use Plaid\Http\Requests\Transfer\ListRequest;
use Plaid\Http\Requests\Transfer\SweepGetRequest;
use Plaid\Http\Requests\Transfer\SweepListRequest;
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
    public function capabilitiesGet(array $data = []): Response
    {
        return $this->connector->send(new CapabilitiesGetRequest($data));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function create(array $data = []): Response
    {
        return $this->connector->send(new CreateRequest($data));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function eventList(array $data = []): Response
    {
        return $this->connector->send(new EventListRequest($data));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function eventSync(array $data = []): Response
    {
        return $this->connector->send(new EventSyncRequest($data));
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
    public function intentCreate(array $data = []): Response
    {
        return $this->connector->send(new IntentCreateRequest($data));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function intentGet(array $data = []): Response
    {
        return $this->connector->send(new IntentGetRequest($data));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function ledgerDeposit(array $data = []): Response
    {
        return $this->connector->send(new LedgerDepositRequest($data));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function ledgerDistribute(array $data = []): Response
    {
        return $this->connector->send(new LedgerDistributeRequest($data));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function ledgerGet(array $data = []): Response
    {
        return $this->connector->send(new LedgerGetRequest($data));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function ledgerWithdraw(array $data = []): Response
    {
        return $this->connector->send(new LedgerWithdrawRequest($data));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function list(array $data = []): Response
    {
        return $this->connector->send(new ListRequest($data));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function sweepGet(array $data = []): Response
    {
        return $this->connector->send(new SweepGetRequest($data));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function sweepList(array $data = []): Response
    {
        return $this->connector->send(new SweepListRequest($data));
    }
}
