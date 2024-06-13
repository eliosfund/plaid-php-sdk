<?php

declare(strict_types=1);

namespace Plaid;

enum Environment: string
{
    case SANDBOX = 'sandbox';
    case DEVELOPMENT = 'development';
    case PRODUCTION = 'production';
}
