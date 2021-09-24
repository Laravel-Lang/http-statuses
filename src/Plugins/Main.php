<?php

declare(strict_types=1);

namespace YourNamespace\Translations\Plugins;

use Helldar\LaravelLangPublisher\Plugins\BasePlugin;

class Main extends BasePlugin
{
    public function vendor(): string
    {
        return '<your_namespace>';
    }

    public function files(): array
    {
        return [
            'en.json'    => '{locale}.json',
            'custom.php' => '{locale}/custom.php',
        ];
    }
}
