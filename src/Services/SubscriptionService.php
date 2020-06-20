<?php

namespace Faithgen\Miscellaneous\Services;

use Faithgen\Miscellaneous\Models\Subscription;
use Illuminate\Database\Eloquent\Model as ParentModel;
use InnoFlash\LaraStart\Services\CRUDServices;

class SubscriptionService extends CRUDServices
{
    private Subscription $subscription;

    public function __construct(Subscription $subscription)
    {
        if (request()->has('subscription_id')) {
            $this->subscription = Subscription::findOrFail(request('subscription_id'));
        } else {
            $this->subscription = $subscription;
        }
    }

    /**
     * Retrieves an instance of subscription.
     */
    public function getSubscription(): Subscription
    {
        return $this->subscription;
    }

    /**
     * Makes a list of fields that you do not want to be sent
     * to the create or update methods.
     * Its mainly the fields that you do not have in the subscriptions table.
     */
    public function getUnsetFields(): array
    {
        return ['subscription_id'];
    }

    /**
     * This returns the model found in the constructor
     * or an instance of the class if no subscription is found.
     */
    public function getModel()
    {
        return $this->getSubscription();
    }

    /**
     * Attaches a parent to the current subscription.
     * You can delete this if you do not intent to create subscriptions from parent relationships.
     */
    public function getParentRelationship()
    {
        return [
            ParentModel::class,
            'relationshipName',
        ];
    }
}
