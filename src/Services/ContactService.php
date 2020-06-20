<?php

namespace Faithgen\Miscellaneous\Services;

use Faithgen\Miscellaneous\Models\Contact;
use Illuminate\Database\Eloquent\Model as ParentModel;
use InnoFlash\LaraStart\Services\CRUDServices;

class ContactService extends CRUDServices
{
    private Contact $contact;

    public function __construct(Contact $contact)
    {
        if (request()->has('contact_id')) {
            $this->contact = Contact::findOrFail(request('contact_id'));
        } else {
            $this->contact = $contact;
        }
    }

    /**
     * Retrieves an instance of contact.
     */
    public function getContact(): Contact
    {
        return $this->contact;
    }

    /**
     * Makes a list of fields that you do not want to be sent
     * to the create or update methods.
     * Its mainly the fields that you do not have in the contacts table.
     */
    public function getUnsetFields(): array
    {
        return ['contact_id'];
    }

    /**
     * This returns the model found in the constructor
     * or an instance of the class if no contact is found.
     */
    public function getModel()
    {
        return $this->getContact();
    }

    /**
     * Attaches a parent to the current contact
     * You can delete this if you do not intent to create contacts from parent relationships.
     */
    public function getParentRelationship()
    {
        return [
            ParentModel::class,
            'relationshipName',
        ];
    }
}
