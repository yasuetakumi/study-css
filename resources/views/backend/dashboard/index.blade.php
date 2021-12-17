@extends('backend._base.content_form')

@section('content')
<div style="background-color: #ffff88; color:#ee4400; margin-top:10px;">
    <div>Please implement dashboard(top page) here.</div>
    <div>ここにダッシュボード(トップページ)を実装してください。</div>
    <div>
        If you need default page, please modify app/Http/Controllers/Auth/LoginController.php -> authenticated() method. <br>
        After that, if you don't need dashboard page, please remove all /dashboard routing.
    </div>
</div>
@endsection
