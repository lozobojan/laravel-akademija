@extends('layouts.main')

@section('content')

    <form action="/cities/{{ $city->id }}" method="POST">
            
        @csrf
        @method('PUT')

        <input type="text" name="name" placeholder="City name" value="{{ $city->name }}">
        <input type="number" min="1" placeholder="Population" name="population" value="{{ $city->population }}">

        <button>SAVE</button>

    </form>

@endsection