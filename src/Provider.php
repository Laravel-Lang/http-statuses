<?php

declare(strict_types=1);

namespace LaravelLang\HttpStatuses;

use Helldar\LaravelLangPublisher\Plugins\BaseProvider;
use LaravelLang\HttpStatuses\Plugins\Main;

class Provider extends BaseProvider
{
    public function basePath(): string
    {
        return base_path('vendor/laravel-lang/http-statuses');
    }

    public function plugins(): array
    {
        $this->resolvePlugins([
            Main::class,
        ]);
    }
}
