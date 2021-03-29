@extends('layouts.main')

@section('page-title', 'Dodaj novi grad')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="/contacts" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="row mb-4">
                        <div class="col-3">
                            <input type="text" name="name" placeholder="Contact name" class="form-control" value="{{ old('name') }}" >
                        </div>
                        <div class="col-3">
                            <input type="text" name="phone" placeholder="Contact phone" class="form-control" value="{{ old('phone') }}" >
                        </div>
                        <div class="col-3">
                            <select name="city_id" id="" class="form-control">
                                @foreach($cities as $city)
                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-3">
                            <input type="file" name="profile_image" class="form-control" >
                        </div>

                    </div>

                    <button class="btn btn-success">SAVE</button>

                </form>
            </div>
        </div>
    </div>

@endsection
