<?php

declare(strict_types=1);

namespace Plaid\Http\Requests\Sandbox;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

class ProcessorTokenCreateRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(protected readonly array $data = [])
    {
        //
    }

    public function resolveEndpoint(): string
    {
        return '/sandbox/processor_token/create';
    }

    protected function defaultBody(): array
    {
        return $this->data;
    }
}
