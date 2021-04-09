<?php

namespace App\Http\Controllers;

use App\Events\NewContactAdded;
use App\Mail\WelcomeMail;
use App\Models\City;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
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
                                ->where('user_id','=' ,auth()->id())
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
            'user_id' => auth()->id()
        ];

        $new_contact = Contact::query()->create($data);

        event(new NewContactAdded($new_contact));

        return redirect('/contacts/'.$new_contact->id);
    }

    public function show(Contact $contact)
    {
        abort_unless($contact->user_id == auth()->id(), 403);
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
        abort_unless($contact->user_id == auth()->id(), 403);
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
        abort_unless($contact->user_id == auth()->id(), 403);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        abort_unless($contact->user_id == auth()->id(), 403);
    }
}
