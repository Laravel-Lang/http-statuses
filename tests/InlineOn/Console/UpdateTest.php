<?php

declare(strict_types=1);

namespace Tests\InlineOn\Console;

use Tests\InlineOnTestCase;

class UpdateTest extends InlineOnTestCase
{
    public function testUpdate()
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

        $this->artisan('lang:update')->run();

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
