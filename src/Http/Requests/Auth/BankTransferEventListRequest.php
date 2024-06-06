<?php

declare(strict_types=1);

namespace Plaid\Http\Requests\Auth;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

class BankTransferEventListRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(protected readonly array $data = [])
    {
        //
    }

    public function resolveEndpoint(): string
    {
        return '/bank_transfer/event/list';
    }

    protected function defaultBody(): array
    {
        return $this->data;
    }
}
