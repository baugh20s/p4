<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use App\Hobby;

class ContactController extends Controller
{

    /*
    * show SEARCH form
    */
    public function search(Request $request)
    {
        return view('crm.search')->with([
            'firstNameSearch' => session('firstName'),
            'lastNameSearch' => session('lastName'),
            'searchResults' => session('searchResults'),
        ]);
    }

    /*
     * SEARCH for contact(s) (process form)
     */
    public function searchProcess(Request $request)
    {
        # define variables as the inputs
        $firstNameSearch = $request->input('firstName', null);
        $lastNameSearch = $request->input('lastName', null);

        # only search if first and/or last name is provided
        if ($firstNameSearch OR $lastNameSearch) {
            # look for matches
            $contacts = Contact::select('*')
                ->where([
                    ['first_name', 'like', '%' . $firstNameSearch . '%'],
                    ['last_name', 'like', '%' . $lastNameSearch . '%'],
                ])
                ->get();
        }

        # redirect to index page with first and last name search values from session
        return redirect('/search')->with([
            'firstName' => $firstNameSearch,
            'lastName' => $lastNameSearch,
            'searchResults' => $contacts,
        ]);
    }

    /*
    * INDEX
     */
    public function index()
    {
        $contacts = Contact::orderBy('last_name')->limit(25)->get();

        return view('crm.index')->with([
            'contacts' => $contacts,
        ]);
    }

    /*
    * show CREATE form
     */
    public function create()
    {
        $hobbies = Hobby::getForCheckboxes();

        return view('crm.create')->with([
            'hobbies' => $hobbies,
        ]);
    }

    /*
     * CREATE record (store record)
     */
    public function storeNew(Request $request)
    {
        # Validate the request data
        $request->validate([
            'firstName' => 'required|string|between:1,75',
            'lastName' => 'required|string|between:1,125',
            'emailType' => 'required|string',
            'email' => 'required|email|between:7,100',
            'phoneType' => 'required|string',
            'phone' => 'required',
        ]);

        $contact = new Contact();
        $contact->first_name = $request->firstName;
        $contact->last_name = $request->lastName;
        $contact->full_name = $request->firstName . ' ' . $request->lastName;
        $contact->email_type = $request->emailType;
        $contact->email = $request->email;
        $contact->phone_type = $request->phoneType;
        $contact->phone = $request->phone;
        $contact->save();

        $contact->hobbies()->sync($request->hobbies);

        return redirect('/contacts')->with([
            'alert' => 'Your contact was added.'
        ]);
    }

    /*
     * READ
     */
    public function read($id)
    {
        $contact = \App\Contact::find($id);
        $hobby = \App\Hobby::find($id);

        return view('crm.read')->with([
            'contact' => $contact,
            'hobby' => $hobby,
        ]);
    }

    /*
     * SHOW UPDATE form
     */
    public function edit($id)
    {
        $contact = Contact::find($id);

        $hobbies = Hobby::getForCheckboxes();

        $hobbiesForContact = $contact->hobbies()->pluck('hobbies.id')->toArray();

        return view('crm.update')->with([
            'contact' => $contact,
            'hobbies' => $hobbies,
            'hobbiesForContact' => $hobbiesForContact,
        ]);
    }

    /*
     * PROCESS UPDATE
     */
    public function update(Request $request, $id)
    {
        # Validate the request data
        $request->validate([
            'firstName' => 'required|string|between:1,75',
            'lastName' => 'required|string|between:1,125',
            'emailType' => 'required|string',
            'email' => 'required|email|between:7,100',
            'phoneType' => 'required|string',
            'phone' => 'required',
        ]);

        $contact = Contact::find($id);

        $contact->hobbies()->sync($request->hobbies);

        $contact->first_name = $request->firstName;
        $contact->last_name = $request->lastName;
        $contact->full_name = $request->firstName . ' ' . $request->lastName;
        $contact->email_type = $request->emailType;
        $contact->email = $request->email;
        $contact->phone_type = $request->phoneType;
        $contact->phone = $request->phone;
        $contact->save();

        return redirect('/contacts/' . $id . '/edit')->with([
            'alert' => 'Your contact was updated.',
        ]);
    }

    /*
    * SHOW DELETE confirmation page
    */
    public function delete($id)
    {
        $contact = Contact::find($id);

        return view('crm.delete')->with([
            'contact' => $contact,
        ]);
    }

    /*
     * PROCESS DELETE
     */
    public function destroy($id)
    {
        $contact = Contact::find($id);

        $contact->hobbies()->detach();

        $contact->delete();

        return redirect('/contacts')->with([
            'alert' => ' " ' . $contact->full_name . ' " was removed.'
        ]);
    }

}