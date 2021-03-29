@extends('layouts.main')
@section('page_title', 'Country details')

@section('content')

    <div class="container">
        <h4>{{ $country->name }}</h4>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                </tr>
            </thead>
            <tbody>
                @foreach($country->cities as $city )
                    <tr>
                        <td>{{ $city->id }}</td>
                        <td>{{ $city->name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>


@endsection
