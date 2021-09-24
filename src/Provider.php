<?php

declare(strict_types=1);

namespace YourNamespace\Translations;

use Helldar\LaravelLangPublisher\Plugins\BaseProvider;
use YourNamespace\Translations\Plugins\Bar;
use YourNamespace\Translations\Plugins\Foo;
use YourNamespace\Translations\Plugins\Main;

class Provider extends BaseProvider
{
    public function basePath(): string
    {
        return base_path('vendor/<your_namespace>');
    }

    public function plugins(): array
    {
        $this->resolvePlugins([
            Main::class,
            Foo::class,
            Bar::class,
        ]);
    }
}
