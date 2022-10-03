<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{AssetHelper::version('css/backend/backend-custom.css')}}">
    <link rel="stylesheet" href="{{asset('css/frontend/app.css')}}">
</head>
<body>
    <p>This is email is to inform you that new properties have been published which match your saved search</p>

    <p>Properties</p>
    @foreach ($row->properties as $property)
        @include('mail._components.property_list')
    @endforeach

    <p>Search Condition</p>
    <ul>
        @foreach ($row->searchCondition as $conditionKey => $condition)
            <li>[{{ $conditionKey }}] {{ $condition }}</li>
        @endforeach
    </ul>
</body>
</html>
