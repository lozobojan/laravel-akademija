@extends('layouts.main')

@section('page_title', 'Contacts listing')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12">

                <form action="/contacts" method="GET">
                    <div class="row mb-3">
                        <div class="col-4">
                            <input type="text" class="form-control" name="filter_name" placeholder="Search by name" value="{{ request('filter_name') }}" >
                        </div>
                        <div class="col-4">
                            <select name="filter_city" class="form-control" id="">
                                <option value="">- svi gradovi -</option>
                                @foreach($cities as $city)
                                    <option value="{{ $city->id }}" {{ request('filter_city') == $city->id ? 'selected' : '' }} >{{ $city->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4">
                            <input type="submit" class="btn btn-primary btn-block" value="SEARCH" >
                        </div>
                    </div>
                </form>

                <table class="table table-hover table-stripped" >

                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>City</th>
                        <th>Country</th>
                        <th>Details</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach ($contacts as $contact)
                        <tr>
                            <td>{{ $contact->id }}</td>
                            <td>{{ $contact->name }}</td>
                            <td>{{ $contact->city->name }}</td>
                            <td>{{ $contact->city->country->name }}</td>
                            <td> <a href="/contacts/{{ $contact->id }}">details</a> </td>
                            <td> <a href="/contacts/{{ $contact->id }}/edit">edit</a> </td>
                            <td>
                                <form action="/contacts/{{ $contact->id }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button>delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <div class="mt-3 ml-3" >
                    {{ $contacts->links() }}
                </div>
            </div>
        </div>
    </div>



@endsection
