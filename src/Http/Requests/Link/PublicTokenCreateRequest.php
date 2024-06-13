<?php

declare(strict_types=1);

namespace Plaid\Http\Requests\Link;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

class PublicTokenCreateRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(protected readonly array $data = [])
    {
        //
    }

    public function resolveEndpoint(): string
    {
        return '/link/token/create';
    }

    protected function defaultBody(): array
    {
        return $this->data;
    }
}
