<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ContactResource;
use App\Http\Resources\User;
use App\Http\Resources\UserCollection;
use App\Models\City;
use App\Models\Contact;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function getContacts(Request $request){
        $contacts = Contact::query()->when($request->search, function($query) use ($request){
            $term = strtolower($request->search);
            $query->whereRaw('lower(name) like (?)', ["%{$term}%"]);
        })
            ->where('user_id','=' ,auth()->id())
            ->get();

        // return ContactResource::collection(Contact::paginate(10));
        return new UserCollection(\App\Models\User::all());
    }

    public function saveContact(Request $request){

        $data = [
            'name' => $request->name,
            'phone' => $request->phone,
            'city_id' => $request->city_id,
            'user_id' => auth()->id()
        ];

        try {
            Contact::query()->create($data);
            return response()->json(['status' => "OK"]);
        }catch(QueryException $e){
            return response()->json(['status' => "ERR", 'msg' => $e->getMessage()]);
        }

    }

    public function updateContact(Request $request, Contact $contact){

        abort_unless( auth()->id() === $contact->user_id, 403 );

        try {
            $contact->update($request->all());
            return response()->json(['status' => "OK"]);
        }catch(QueryException $e){
            return response()->json(['status' => "ERR", 'msg' => $e->getMessage()]);
        }

    }

    public function deleteContact(Request $request, Contact $contact){

        abort_unless( auth()->id() === $contact->user_id, 403 );

        try {
            $contact->delete();
            return response()->json(['status' => "OK"]);
        }catch(QueryException $e){
            return response()->json(['status' => "ERR", 'msg' => $e->getMessage()]);
        }

    }

    public function getContactsByCity(Request $request){
        $data = City::query()
                    ->bigCities()
                    ->with([
                        'contacts' => function($query){
                            $query->where('user_id', '=', auth()->id());
                        }
                    ])
                    ->has('contacts')
                    ->get()
                    ->append('contacts_cnt');
        return response()->json(['cities' => $data]);
    }
}
