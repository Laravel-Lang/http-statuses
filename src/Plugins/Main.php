<?php

declare(strict_types=1);

namespace LaravelLang\HttpStatuses\Plugins;

use LaravelLang\Publisher\Plugins\Plugin;

class Main extends Plugin
{
    public function files(): array
    {
        return [
            'http-statuses.php' => '{locale}/http-statuses.php',
        ];
    }
}
