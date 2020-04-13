<?php

namespace Faithgen\Miscellaneous\Tests;

use Faithgen\Miscellaneous\MiscellaneousServiceProvider;
use Orchestra\Testbench\TestCase;

class ExampleTest extends TestCase
{
    protected function getPackageProviders($app)
    {
        return [MiscellaneousServiceProvider::class];
    }

    /** @test */
    public function true_is_true()
    {
        $this->assertTrue(true);
    }
}
