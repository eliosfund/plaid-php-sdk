<?php

declare(strict_types=1);

namespace Plaid\Http\Resources;

use Plaid\Http\Requests\Transfer\AuthorizationCreate;
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
    public function createAuthorization(string $accountId, string $type, string $network, string $amount, string $achClass): Response
    {
        return $this->connector->send(new AuthorizationCreate($accountId, $type, $network, $amount, $achClass));
    }
}
