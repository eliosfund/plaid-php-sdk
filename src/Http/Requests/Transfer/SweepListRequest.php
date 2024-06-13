<?php

declare(strict_types=1);

namespace Plaid\Http\Requests\Transfer;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

class SweepListRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(protected readonly array $data = [])
    {
        //
    }

    public function resolveEndpoint(): string
    {
        return '/transfer/sweep/list';
    }

    protected function defaultBody(): array
    {
        return $this->data;
    }
}
