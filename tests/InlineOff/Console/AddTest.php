<?php

declare(strict_types=1);

namespace Tests\InlineOff\Console;

use LaravelLang\Publisher\Exceptions\SourceLocaleDoesntExistsException;
use LaravelLang\Publisher\Facades\Helpers\Locales;
use Tests\InlineOffTestCase;

class AddTest extends InlineOffTestCase
{
    public function testAcceptConfirmation()
    {
        $this->artisan('lang:add')
            ->expectsConfirmation('Do you want to add all localizations?')
            ->expectsChoice('Select localizations to add (specify the necessary localizations separated by commas):', $this->locale, Locales::available())
            ->assertExitCode(0)
            ->run();
    }

    public function testUnknownLanguageFromCommand()
    {
        $this->expectException(SourceLocaleDoesntExistsException::class);
        $this->expectExceptionMessage('The source "foo" localization was not found.');

        $locales = 'foo';

        $this->artisan('lang:add', compact('locales'))->run();
    }

    public function testInstall()
    {
        $this->copyFixtures();

        $this->assertSame('Foo', __('http-statuses.unknownError'));
        $this->assertSame('Bar', __('http-statuses.0'));

        $this->assertSame('Foo', __('http-statuses.100'));
        $this->assertSame('Bar', __('http-statuses.101'));
        $this->assertSame('Baz', __('http-statuses.102'));

        $this->assertSame('Foo', __('http-statuses.200'));
        $this->assertSame('Bar', __('http-statuses.201'));
        $this->assertSame('Baz', __('http-statuses.202'));

        $this->assertSame('Custom key', __('http-statuses.custom'));

        $this->artisan('lang:add', [
            'locales' => $this->default,
        ])->run();

        $this->refreshLocales();

        $this->assertSame('Foo', __('http-statuses.unknownError'));
        $this->assertSame('Bar', __('http-statuses.0'));

        $this->assertSame('Foo', __('http-statuses.100'));
        $this->assertSame('Bar', __('http-statuses.101'));
        $this->assertSame('Baz', __('http-statuses.102'));

        $this->assertSame('OK', __('http-statuses.200'));
        $this->assertSame('Created', __('http-statuses.201'));
        $this->assertSame('Accepted', __('http-statuses.202'));

        $this->assertSame('Custom key', __('http-statuses.custom'));
    }
}
