<?php

declare(strict_types=1);

namespace Tests\InlineOn\Console;

use Helldar\LaravelLangPublisher\Exceptions\SourceLocaleDoesntExistsException;
use Helldar\LaravelLangPublisher\Facades\Helpers\Locales;
use Tests\InlineOnTestCase;

class ResetTest extends InlineOnTestCase
{
    public function testAcceptConfirmation()
    {
        $this->artisan('lang:reset')
            ->expectsConfirmation('Do you want to reset all localizations?')
            ->expectsChoice('Select localizations to reset (specify the necessary localizations separated by commas):', $this->locale, Locales::installed())
            ->assertExitCode(0)
            ->run();
    }

    public function testUnknownLanguageFromCommand()
    {
        $this->expectException(SourceLocaleDoesntExistsException::class);
        $this->expectExceptionMessage('The source "foo" localization was not found.');

        $locales = 'foo';

        $this->artisan('lang:reset', compact('locales'))->run();
    }

    public function testReset()
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

        $this->artisan('lang:reset', [
            'locales' => $this->default,
        ])->run();

        $this->refreshLocales();

        $this->assertSame('Unknown Error', __('http-statuses.unknownError'));
        $this->assertSame('Unknown Error', __('http-statuses.0'));

        $this->assertSame('Continue', __('http-statuses.100'));
        $this->assertSame('Switching Protocols', __('http-statuses.101'));
        $this->assertSame('Processing', __('http-statuses.102'));

        $this->assertSame('OK', __('http-statuses.200'));
        $this->assertSame('Created', __('http-statuses.201'));
        $this->assertSame('Accepted', __('http-statuses.202'));

        $this->assertSame('Custom key', __('http-statuses.custom'));
    }

    public function testFull()
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

        $this->artisan('lang:reset', [
            'locales' => $this->default,
            '--full'  => true,
        ])->run();

        $this->refreshLocales();

        $this->assertSame('Unknown Error', __('http-statuses.unknownError'));
        $this->assertSame('Unknown Error', __('http-statuses.0'));

        $this->assertSame('Continue', __('http-statuses.100'));
        $this->assertSame('Switching Protocols', __('http-statuses.101'));
        $this->assertSame('Processing', __('http-statuses.102'));

        $this->assertSame('OK', __('http-statuses.200'));
        $this->assertSame('Created', __('http-statuses.201'));
        $this->assertSame('Accepted', __('http-statuses.202'));

        $this->assertSame('http-statuses.custom', __('http-statuses.custom'));
    }
}
