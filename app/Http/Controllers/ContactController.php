<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeMail;
use App\Models\City;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{

    public function index(Request $request)
    {
        $cities = City::all();
        $contacts = Contact::query()
                                ->when($request->filter_name, function($query) use ($request) {
                                    $term = strtolower($request->filter_name);
                                    $query->whereRaw('lower(name) like (?)', ["%{$term}%"]);
                                })
                                ->when($request->filter_city, function($query) use ($request) {
                                    $query->where('city_id', '=', $request->filter_city );
                                })
                                ->paginate(Contact::PER_PAGE);
        return view('contacts.index', compact(['contacts', 'cities']));
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

        Mail::to('lozobojan@gmail.com')->send(new WelcomeMail($new_contact->name));

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
