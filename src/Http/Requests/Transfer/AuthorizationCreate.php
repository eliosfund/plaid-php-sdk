<?php

declare(strict_types=1);

namespace Plaid\Http\Requests\Transfer;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

class AuthorizationCreate extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        protected string $accountId,
        protected string $type,
        protected string $network,
        protected string $amount,
        protected string $achClass,
    ) {
        //
    }

    public function resolveEndpoint(): string
    {
        return '/transfer/authorization/create';
    }

    protected function defaultBody(): array
    {
        return [
            'account_id' => $this->accountId,
            'type' => $this->type,
            'network' => $this->network,
            'amount' => $this->amount,
            'ach_class' => $this->achClass,
        ];
    }
}
