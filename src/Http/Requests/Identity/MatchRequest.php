<?php

declare(strict_types=1);

namespace Plaid\Http\Requests\Identity;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

class MatchRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(protected readonly array $data = [])
    {
        //
    }

    public function resolveEndpoint(): string
    {
        return '/identity/match';
    }

    protected function defaultBody(): array
    {
        return $this->data;
    }
}
