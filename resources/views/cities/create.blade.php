@extends('layouts.main')

@section('page-title', 'Dodaj novi grad')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="/cities" method="post">
                    @csrf

                    <div class="row mb-4">
                        <div class="col-6">
                            <input type="text" name="name" placeholder="City name" class="form-control @error('name') is-invalid @enderror " value="{{ old('name') }}" >
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-6">
                            <input type="number" min="1" placeholder="Population" name="population" class="form-control @error('population') is-invalid @enderror" value="{{ old('population') }}">
                            @error('population')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>


                    {{--        @foreach($errors as $err)--}}
                    {{--            <p>$err->message</p>--}}
                    {{--        @endforeach--}}

                    <button class="btn btn-success">SAVE</button>

                </form>
            </div>
        </div>
    </div>

@endsection
