<?php

declare(strict_types=1);

namespace Plaid\Http\Resources;

use Plaid\Http\Requests\Sandbox\IncomeFireWebhook;
use Plaid\Http\Requests\Sandbox\ItemFireWebhook;
use Plaid\Http\Requests\Sandbox\ProcessorTokenCreateRequest;
use Plaid\Http\Requests\Sandbox\PublicTokenCreateRequest;
use Plaid\Http\Requests\Sandbox\TransferFireWebhook;
use Plaid\Http\Requests\Sandbox\TransferRefundSimulate;
use Plaid\Http\Requests\Sandbox\TransferSimulate;
use Plaid\Http\Requests\Sandbox\TransferSweepSimulate;
use Plaid\Http\Requests\Sandbox\TransferTestClockAdvance;
use Plaid\Http\Requests\Sandbox\TransferTestClockCreate;
use Plaid\Http\Requests\Sandbox\TransferTestClockGet;
use Plaid\Http\Requests\Sandbox\TransferTestClockList;
use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;

class SandboxResource extends BaseResource
{
    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function incomeFireWebhook(array $data = []): Response
    {
        return $this->connector->send(new IncomeFireWebhook($data));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function itemFireWebhook(array $data = []): Response
    {
        return $this->connector->send(new ItemFireWebhook($data));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function processorTokenCreate(array $data = []): Response
    {
        return $this->connector->send(new ProcessorTokenCreateRequest($data));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function publicTokenCreate(array $data = []): Response
    {
        return $this->connector->send(new PublicTokenCreateRequest($data));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function transferFireWebhook(array $data = []): Response
    {
        return $this->connector->send(new TransferFireWebhook($data));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function transferRefundSimulate(array $data = []): Response
    {
        return $this->connector->send(new TransferRefundSimulate($data));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function transferSimulate(array $data = []): Response
    {
        return $this->connector->send(new TransferSimulate($data));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function transferSweepSimulate(array $data = []): Response
    {
        return $this->connector->send(new TransferSweepSimulate($data));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function transferTestClockAdvance(array $data = []): Response
    {
        return $this->connector->send(new TransferTestClockAdvance($data));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function transferTestClockCreate(array $data = []): Response
    {
        return $this->connector->send(new TransferTestClockCreate($data));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function transferTestClockGet(array $data = []): Response
    {
        return $this->connector->send(new TransferTestClockGet($data));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function transferTestClockList(array $data = []): Response
    {
        return $this->connector->send(new TransferTestClockList($data));
    }
}
