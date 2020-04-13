<?php

namespace Faithgen\Miscellaneous\Http\Controllers;

use Faithgen\Miscellaneous\Http\Requests\SubscriptionCreateRequest;
use Faithgen\Miscellaneous\Models\Subscription;
use Faithgen\Miscellaneous\Services\SubscriptionService;
use Illuminate\Routing\Controller;

class SubscriptionController extends Controller
{
    /**
     * @var SubscriptionService
     */
    private SubscriptionService $subscriptionService;

    /**
     * SubscriptionController constructor.
     *
     * @param  SubscriptionService  $subscriptionService
     */
    public function __construct(SubscriptionService $subscriptionService)
    {
        $this->subscriptionService = $subscriptionService;
    }

    /**
     * Subscribes a user to FaithGen.
     *
     * @param  SubscriptionCreateRequest  $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(SubscriptionCreateRequest $request)
    {
        return $this->subscriptionService->create($request->validated(),
            'Subscription requested. Please check your email to confirm');
    }

    public function approveSubscription(Subscription $subscription, string $email)
    {
        if ($subscription->email === $email) {
            $subscription->confirmed = true;
            $subscription->save();

            return redirect()->away(config('miscellaneous.success-subscription-url').$email);
        } else {
            abort(422, 'Can not approve this subscription');
        }
    }
}
