@extends('layouts.main')

@section('page_title', 'TEST PAGE')

@section('content')

        <input type="text" value="{{ $search }}">
        <br>
        <br>

        <h1>{{ $title }} za objekat {{ $test_id }}</h1>
        <h3>{{ $subtitle }}</h3>

        @if($show_table)
            <table border="1" >
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NAME</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user['id'] }}</td>
                            <td>{{ $user['name'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>Nemate pravo da pristupite tabeli....</p>
        @endif

@endsection