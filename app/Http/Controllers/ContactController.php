<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    public function index()
    {
        $contacts = Contact::query()->paginate(Contact::PER_PAGE);
        return view('contacts.index', ['contacts' => $contacts]);
    }


    public function create()
    {
        $cities = City::all();
        return view('contacts.create', ['cities' => $cities]);
    }


    public function store(Request $request)
    {

        $image_path = 'storage/' . $request->file('profile_image')->store('profile-images');

        $data = [
            'name' => $request->name,
            'phone' => $request->phone,
            'city_id' => $request->city_id,
            'profile_image' => $image_path,
        ];

        $new_contact = Contact::query()->create($data);
        return redirect('/contacts/'.$new_contact->id);
    }


    public function show(Contact $contact)
    {
        return view('contacts.show', ['contact' => $contact]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
