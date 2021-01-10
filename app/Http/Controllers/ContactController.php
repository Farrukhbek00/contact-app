<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Email;
use App\Models\Phone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class ContactController extends Controller
{
    protected $contact;

    public function __construct(Contact $contact) {
        $this->contact = $contact;
    }

    public function index()
    {
        $contacts = $this->contact;

        if ($str = \request()->get('search')) {
            $contacts = $contacts->search($str);
        }
        $contacts = $contacts->latest()->paginate(5);

        return view('contacts.index', compact('contacts'))
            ->with('i', (\request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('contacts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'      => 'required|string|unique:contacts,name|max:50',
            'emails'    => 'required|array',
            'emails.*'  => 'required|string|unique:emails,email',
            'phones'    => 'required|array',
            'phones.*'  => 'required|string|unique:phones,phone',
        ]);

        $contact = Contact::create(['name' => $request['name']]);

        foreach ($request['emails'] as $email) {
            $contact->emails()->create(['email' => $email]);
        }

        foreach ($request['phones'] as $phone) {
            $contact->phones()->create(['phone' => $phone]);
        }

        return redirect()->route('contacts.index')
            ->with('success', 'Contact created successfully.');
    }

    public function show(Contact $contact)
    {
        return view('contacts.show', compact('contact'));
    }

    public function edit(Contact $contact)
    {
        return \view('contacts.edit', compact('contact'));
    }

    public function update(Request $request, Contact $contact)
    {
        $emailTemp = true;
        $phoneTemp = true;

        $request->validate([
            'name'      => 'required|string|unique:contacts,name|max:50',
            'emails'    => 'required|array',
            'emails.*'  => 'required|string|unique:emails,email',
            'phones'    => 'required|array',
            'phones.*'  => 'required|string|unique:phones,phone',
        ]);

        $contact->name = $request['name'];
        $contact->save();

        foreach ($contact->emails as $item) {
            if ($emailTemp) {
                $item->email = $request['emails'][0];
                $emailTemp = false;
            } else {
                $item->email = $request['emails'][1];
            }
            $item->save();
        }

        foreach ($contact->phones as $item) {
            if ($phoneTemp) {
                $item->phone = $request['phones'][0];
                $phoneTemp = false;
            } else {
                $item->phone = $request['phones'][1];
            }
            $item->save();
        }

        return redirect()->route('contacts.index')
            ->with('success', 'Contact updated successfully');
    }

    public function destroy(Contact $contact)
    {
        /*
         * Note: When next line works, the observer called "ContactObserver's" will make deleted() method work
         * ContactObserver located in App\Observers
         */
        $contact->delete();

        return redirect()->route('contacts.index')
            ->with('success', 'Contact deleted successfully');
    }

    public function destroyEmail($id) {
        $email = Email::find($id);
        try {
            $email->delete();
        }catch (\Exception $e) {

        }

        return redirect()->to('contacts/'.$email->contact->id)
            ->with('success', 'Email deleted successfully');
    }

    public function destroyPhone($id) {
        $phone = Phone::find($id);
        try {
            $phone->delete();
        }catch (\Exception $e) {

        }

        return redirect()->to('contacts/'.$phone->contact->id)
            ->with('success', 'Phone deleted successfully');
    }

    public function emails()
    {
        $emails = Email::latest()->paginate(5);

        return view('contacts.emails', compact('emails'))
            ->with('i', (\request()->input('page', 1) - 1) * 5);
    }

    public function phones()
    {
        $phones = Phone::latest()->paginate(5);

        return view('contacts.phones', compact('phones'))
            ->with('i', (\request()->input('page', 1) - 1) * 5);
    }
}
