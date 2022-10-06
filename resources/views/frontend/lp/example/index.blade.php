@extends('frontend.lp.layouts.app')

@section('title', 'Title here')

@section('description', 'Please give description here')

@section('content')
{{-- Breadcrumbs --}}
<div class="breadcrumb-wrap">
    <div class="container">
        <div class="row mx-0">
            <div class="col-12 p-0">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page"><a href="#">トップページ</a></li>
                        <li class="breadcrumb-item"><a href="">プライバシーポリシー</a></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
{{-- Put content here --}}

{{-- Dummy content --}}
<div style="height: 1000px"></div>
@endsection

@push('scripts')
{{-- Put JS script here --}}
@endpush
