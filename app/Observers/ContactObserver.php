<?php

namespace App\Observers;

use App\Models\Contact;

class ContactObserver
{
    public function created(Contact $contact)
    {
        //
    }

    public function updated(Contact $contact)
    {
        //
    }

    public function deleted(Contact $contact)
    {
        $contact->phones()->each(function ($item) {
            $item->delete();
        });

        $contact->emails()->each(function ($item) {
            $item->delete();
        });
    }

    public function restored(Contact $contact)
    {
        //
    }

    public function forceDeleted(Contact $contact)
    {
        //
    }
}
