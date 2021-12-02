<?php

declare(strict_types=1);

namespace LaravelLang\HttpStatuses;

use LaravelLang\HttpStatuses\Plugins\Main;
use LaravelLang\Publisher\Plugins\BaseProvider;

class Provider extends BaseProvider
{
    public function basePath(): string
    {
        return __DIR__ . '/../';
    }

    public function plugins(): array
    {
        return $this->resolvePlugins([
            Main::class,
        ]);
    }
}
