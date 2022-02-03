@extends("backend._base.app")
@section('content-wrapper')
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-md-8 mt-5">
            <div class="card rounded-0">
                <div class="card-header bg-white border-bottom-0">
                    <h3 class="card-title mb-0">{{$prefecture->display_name}}</h3>
                    <!-- /.card-tools -->
                </div>
                <hr class="my-0 mx-2">
                <!-- /.card-header -->
                <div class="card-body">
                    <p>{{$prefecture->id}}</p>
                    <p>{{$prefecture->name}}</p>
                    <p>{{$prefecture->area->display_name}}</p>
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>
@endsection
