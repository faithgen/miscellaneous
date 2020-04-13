<?php

namespace Faithgen\Miscellaneous\Http\Controllers;

use Faithgen\Miscellaneous\Http\Requests\ContactCreateRequest;
use Faithgen\Miscellaneous\Services\ContactService;
use Illuminate\Routing\Controller;

class ContactController extends Controller
{
    /**
     * @var ContactService
     */
    private ContactService $contactService;

    /**
     * ContactController constructor.
     *
     * @param  ContactService  $contactService
     */
    function __construct(ContactService $contactService)
    {
        $this->contactService = $contactService;
    }

    /**
     * Creates a query for the given user.
     *
     * @param  ContactCreateRequest  $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function contact(ContactCreateRequest $request)
    {
        return $this->contactService->create($request->validated(),
            'Your query was received, thanks for making contact');
    }
}
