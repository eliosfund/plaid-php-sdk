<?php

declare(strict_types=1);

namespace Plaid\Http\Resources;

use Plaid\Http\Requests\Sandbox\ProcessorTokenCreateRequest;
use Plaid\Http\Requests\Sandbox\PublicTokenCreateRequest;
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
}
