@extends("backend._base.app")
@section('content-wrapper')
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-md-8 mt-5">
            <div class="card rounded-0">
                <div class="card-header bg-white border-bottom-0">
                    <h3 class="card-title mb-0">都道府県</h3>
                    <!-- /.card-tools -->
                </div>
                <hr class="my-0 mx-2">
                <!-- /.card-header -->
                <div class="card-body">
                    <ul class="list-multi-columns">
                        @foreach ($prefectures as $pr)
                            <li>
                                <a href="{{route('prefecture.detail', $pr->name )}}">{{$pr->display_name}}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>
@endsection

@push('css')
    <link rel="stylesheet" href="{{asset('css/frontend/app.css')}}">
@endpush
