@extends('layouts.main')

@section('page_title', 'Contacts listing')

@section('content')

    <table border="1">

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

@endsection
