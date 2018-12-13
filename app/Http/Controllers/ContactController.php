<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;

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
        return view('crm.create');
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
            'phone' => 'required|regex:/(01)[0-9]{9}/',
            /*'hobbies' => 'required'*/
        ]);

        $contact = new Contact();
        $contact->first_name = $request->firstName;
        $contact->last_name = $request->lastName;
        $contact->full_name = $request->firstName.''.$request->lastName;
        $contact->email_type = $request->emailType;
        $contact->email = $request->email;
        $contact->phone_type = $request->phoneType;
        $contact->phone = $request->phone;
        /*$contact->hobbies = $request->hobbies;*/
        $contact->save();

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

        return view('crm.read')->with([
            'contact' => $contact
        ]);
    }

    /*
     * UPDATE
     */
    /*
     * public function update($id)
    {
        $contact = \App\Contact::find($id);

        return redirect('/contacts/{id}')->with([
            'alert' => 'Your contact was updated.'
        ]);
    }
     */

    /*
    * DELETE
    */
    public function delete($id)
    {
        $contact = Contact::destroy($id);

        return redirect('/contacts')->with([
            'alert' => 'Your contact was deleted.'
        ]);
    }

}