<p>This is email is to inform you that new properties have been published which match your saved search</p>

<p>Properties</p>
@foreach ($row->properties as $property)
    <ul>
        <li>Property Url: <a href="{{ route('property.detail', $property->id) }}">{{ route('property.detail', $property->id) }}</a></li>
        <li>Property Location: {{ $property->location }}</li>
        <li>Property Price: {{ $property->rent_amount }}</li>
        <li>Property Area: {{ $property->surface_area }}</li>
    </ul>
@endforeach

<p>Search Condition</p>
<ul>
    @foreach ($row->searchCondition as $conditionKey => $condition)
        <li>[{{ $conditionKey }}] {{ $condition }}</li>
    @endforeach
</ul>
