<?php

namespace Faithgen\Miscellaneous\Observers;

use Faithgen\Miscellaneous\Models\Subscription;
use Faithgen\Miscellaneous\Notifications\ApproveSubscription;

class SubscriptionObserver
{
    /**
     * Handle the subscription "created" event.
     *
     * @param  \Faithgen\Miscellaneous\Models\Subscription  $subscription
     *
     * @return void
     */
    public function created(Subscription $subscription)
    {
        $subscription->notify(new ApproveSubscription($subscription));
    }

    /**
     * Handle the subscription "updated" event.
     *
     * @param  \Faithgen\Miscellaneous\Models\Subscription  $subscription
     *
     * @return void
     */
    public function updated(Subscription $subscription)
    {
        //
    }

    /**
     * Handle the subscription "deleted" event.
     *
     * @param  \Faithgen\Miscellaneous\Models\Subscription  $subscription
     *
     * @return void
     */
    public function deleted(Subscription $subscription)
    {
        //
    }
}
