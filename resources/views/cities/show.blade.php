<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>City details</title>
</head>
<body>
    
    {{-- @if (!is_null($city)) --}}

        <p>ID: {{ $city->id }}</p>
        <p>Name: {{ $city->name }}</p>
        <p>Population: {{ $city->population }}</p>
        
    {{-- @else --}}
        {{-- <p>City not found!</p> --}}
    {{-- @endif --}}

</body>
</html>