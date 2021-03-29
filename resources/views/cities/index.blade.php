@extends('layouts.main')

@section('page_title', 'Cities listing')

@section('content')

    <table border="1">

        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Population</th>
                <th>City/Town</th>
                <th>Country</th>
                <th>Details</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($cities as $city)
                <tr>
                    <td>{{ $city->id }}</td>
                    <td>{{ $city->name }}</td>
                    <td>{{ $city->population }}</td>
                    <td>{{ $city->population > 100000 ? "City" : "Town" }}</td>
                    <td><a href="/countries/{{ $city->country->id }}">{{ $city->country->name }}</a> </td>
                    <td> <a href="/cities/{{ $city->id }}">details</a> </td>
                    <td> <a href="/cities/{{ $city->id }}/edit">edit</a> </td>
                    <td>
                        <form action="/cities/{{ $city->id }}" method="post">
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
        {{ $cities->links() }}
    </div>

@endsection
