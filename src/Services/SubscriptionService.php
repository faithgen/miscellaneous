<?php

namespace Faithgen\Miscellaneous\Services;

use Faithgen\Miscellaneous\Models\Subscription;
use InnoFlash\LaraStart\Services\CRUDServices;

class SubscriptionService extends CRUDServices
{
    protected Subscription $subscription;

    public function __construct()
    {
        $this->subscription = app(Subscription::class);

        $subscriptionId = request()->route('subscription') ?? request('subscription_id');

        if ($subscriptionId) {
            $this->subscription = $this->subscription->resolveRouteBinding($subscriptionId);
        }
    }

    /**
     * Retrieves an instance of subscription.
     *
     * @return \Faithgen\Miscellaneous\Models\Subscription
     */
    public function getSubscription(): Subscription
    {
        return $this->subscription;
    }

    /**
     * Makes a list of fields that you do not want to be sent
     * to the create or update methods.
     * Its mainly the fields that you do not have in the messages table.
     *
     * @return array
     */
    public function getUnsetFields(): array
    {
        return ['subscription_id'];
    }
}
