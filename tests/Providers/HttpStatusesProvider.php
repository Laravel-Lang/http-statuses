<?php

declare(strict_types=1);

namespace Tests\Providers;

use LaravelLang\HttpStatuses\Provider as AppProvider;

class HttpStatusesProvider extends AppProvider
{
    public function basePath(): string
    {
        return __DIR__ . '/../../';
    }
}
