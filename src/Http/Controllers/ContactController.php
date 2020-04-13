<?php

namespace Faithgen\Miscellaneous\Http\Controllers;

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
}
