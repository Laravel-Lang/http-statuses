# Laravel Lang: HTTP Statuses

List of 77 languages for HTTP statuses

[![Stable Version][badge_stable]][link_packagist]
[![Unstable Version][badge_unstable]][link_packagist]
[![Total Downloads][badge_downloads]][link_packagist]
[![License][badge_license]][link_license]

## Prepare Template

Replace `laravel-lang/http-statuses` with your package namespace.


## Installation

To get the latest version of `Extended Lang Translations Template` library, simply require the project using [Composer](https://getcomposer.org):

```
$ composer require laravel-lang/http-statuses --dev
```

Instead, you may of course manually update your `require` block and run `composer update` if you so choose:

```json
{
    "require": {
        "laravel-lang/http-statuses": "^1.0"
    }
}
```

## Using

To install files from this repository into your project, you need to install the [andrey-helldar/laravel-lang-publisher](https://github.com/andrey-helldar/laravel-lang-publisher)
version `^10.1` and above and specify the namespace of this project in its configuration.

For example:

```php
// config/lang-publisher.php

<?php

return [
    // ...

    /*
     * Determines from which packages to synchronize localization files.
     */

    'plugins' => [
        \LaravelLang\HttpStatuses\Provider::class,
    ],
];
```

[badge_stable]:     https://img.shields.io/github/v/release/laravel-lang/http-statuses?label=stable&style=flat-square

[badge_unstable]:   https://img.shields.io/badge/unstable-dev--main-orange?style=flat-square

[badge_downloads]:  https://img.shields.io/packagist/dt/laravel-lang/http-statuses.svg?style=flat-square

[badge_license]:    https://img.shields.io/packagist/l/laravel-lang/http-statuses.svg?style=flat-square

[link_packagist]:   https://packagist.org/packages/laravel-lang/http-statuses

[link_license]:     LICENSE
