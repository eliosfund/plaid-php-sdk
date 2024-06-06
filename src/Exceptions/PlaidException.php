<?php

declare(strict_types=1);

namespace Plaid\Exceptions;

use Exception;

class PlaidException extends Exception
{
    protected ?string $documentationUrl;

    protected ?array $response;

    protected ?string $requestId;

    protected ?string $type;

    public static function fromPlaidError(array $error): self
    {
        return tap(new static(data_get($error, 'error_message')), function (self $exception) use ($error) {
            $exception->code = data_get($error, 'error_code');
            $exception->documentationUrl = data_get($error, 'documentation_url');
            $exception->response = $error;
            $exception->requestId = data_get($error, 'request_id');
            $exception->type = data_get($error, 'error_type');
        });
    }

    public function getDocumentationUrl(): ?string
    {
        return $this->documentationUrl;
    }

    public function getResponse(): ?array
    {
        return $this->response;
    }

    public function getRequestId(): ?string
    {
        return $this->requestId;
    }

    public function getType(): ?string
    {
        return $this->type;
    }
}
