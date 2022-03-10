<div class="row px-4 py-3 border-right">
    <div class="col-4 px-1">
        <img class="w-100 py-1" src="{{asset('uploads/' . $pr->thumbnail_image_main )}}" onerror="{{asset('img/backend/noimage.png')}}" alt="thumbnail">
    </div>
    <div class="col-8 px-1">
        <a href="{{route('property.detail', $pr->id)}}" class="text-justify text-link">{{$pr->location}}/{{toTsubo($pr->surface_area)}}坪/{{$pr->property_stations[0]->station->display_name}}駅 {{$pr->property_stations[0]->walking_distance->value}}分</a>
    </div>
</div>
