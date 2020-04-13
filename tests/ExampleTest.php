<?php

namespace Faithgen\Miscellaneous\Tests;

use Orchestra\Testbench\TestCase;
use Faithgen\Miscellaneous\MiscellaneousServiceProvider;

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
