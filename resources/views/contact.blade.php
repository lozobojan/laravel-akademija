@extends('layouts.main')

@section('page_title', 'Contact us page')

@section('content')

    <h4>Contact us...</h4>

    <form action="/contact" method="POST">

        @csrf
        @method("DELETE")

        <input type="text" placeholder="First name" name="first_name">
        <input type="text" placeholder="Last name" name="last_name">
        <textarea name="message" id="" rows="4"></textarea>

        <button>SEND!</button>
    </form>

@endsection