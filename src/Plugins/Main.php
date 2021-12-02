<?php

declare(strict_types=1);

namespace LaravelLang\HttpStatuses\Plugins;

use Helldar\LaravelLangPublisher\Plugins\BasePlugin;

class Main extends BasePlugin
{
    public function vendor(): string
    {
        return 'laravel-lang/http-statuses';
    }

    public function files(): array
    {
        return [
            'http-statuses.php' => '{locale}/http-statuses.php',
        ];
    }
}
