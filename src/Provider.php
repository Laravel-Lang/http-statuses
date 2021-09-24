<?php

declare(strict_types=1);

namespace LaravelLang\HttpStatuses;

use Helldar\LaravelLangPublisher\Plugins\BaseProvider;
use LaravelLang\HttpStatuses\Plugins\Main;

class Provider extends BaseProvider
{
    public function name(): string
    {
        return 'laravel-lang/http-statuses';
    }

    public function plugins(): array
    {
        $this->resolvePlugins([
            Main::class,
        ]);
    }
}
