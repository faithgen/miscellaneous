<?php

namespace Faithgen\Miscellaneous\Services;

use Faithgen\Miscellaneous\Models\Contact;
use InnoFlash\LaraStart\Services\CRUDServices;

class ContactService extends CRUDServices
{
    protected Contact $contact;

    public function __construct()
    {
        $this->contact = app(Contact::class);

        $contactId = request()->route('contact') ?? request('contact_id');

        if ($contactId) {
            $this->contact = $this->contact->resolveRouteBinding($contactId);
        }
    }

    /**
     * Retrieves an instance of contact.
     *
     * @return \Faithgen\Miscellaneous\Models\Contact
     */
    public function getContact(): Contact
    {
        return $this->contact;
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
        return ['contact_id'];
    }
}
