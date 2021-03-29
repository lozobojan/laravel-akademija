@extends('layouts.main')
@section('page_title', 'Contact details')

@section('content')

    <div class="container">

        <h4>{{ $contact->name }}</h4>
        <h4>{{ $contact->city->name }}</h4>
        <h4>{{ $contact->city->country->name }}</h4>

        <img src="{{ asset($contact->profile_image) }}" alt="" class="img-fluid">

    </div>


@endsection
