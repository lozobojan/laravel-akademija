<?php

namespace App\Http\Controllers;

use App\Http\Requests\CityRequest;
use Illuminate\Http\Request;
use App\Models\City;

class CityController extends Controller
{

    public function index()
    {
        // query builder
        // $cities = \DB::table('cities')
        //                     ->where('population', '>', '20000')
        //                     ->get();

        // eloquent ORM
        $cities = City::query()->paginate(City::PER_PAGE);
        return view('cities.index', ['cities' => $cities] );
    }

    public function create()
    {
        return view('cities.create');
    }


    public function store(CityRequest $request)
    {
        City::query()->create([ 'name' => $request->name, 'population' => $request->population ]);
        return redirect('/cities');
    }

    // route-model binding
    public function show(City $city)
    {
        // $city = \DB::table('cities')->where('id', '=', $id)->first();
        // $city = City::findOrFail($id);
        return view('cities.show', ['city' => $city] );
    }

    public function edit(City $city)
    {
        // $city = City::findOrFail($id);
        return view('cities.edit', ['city' => $city]);
    }

    public function update(CityRequest $request, City $city)
    {
        // $city = City::findOrFail($id);
        // $city->name = $request->name;
        // $city->population = $request->population;
        // $city->save();
        $city->update([ 'name' => $request->name, 'population' => $request->population ]);
        return redirect('/cities');
    }

    public function destroy(City $city)
    {
        $city->delete();
        return redirect('/cities');
    }
}
