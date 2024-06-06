<?php

declare(strict_types=1);

namespace Plaid\Http\Requests;

use Saloon\Contracts\Body\HasBody;
use Saloon\Http\Request;
use Saloon\Repositories\Body\JsonBodyRepository;
use Saloon\Traits\Body\HasJsonBody;

abstract class AbstractRequest extends Request implements HasBody
{
    use HasJsonBody;

    public function body(): JsonBodyRepository
    {
        $body = parent::body();
    }
}
