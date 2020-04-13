<?php

namespace Faithgen\Miscellaneous;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Faithgen\Miscellaneous\Skeleton\SkeletonClass
 */
class MiscellaneousFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'miscellaneous';
    }
}
