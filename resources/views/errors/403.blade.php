@extends('layouts.FrontEnd.master')

@section('title', 'عدم دسترسی')

@section('meta_description')
<meta name="description" content="403">
@endsection

@section('content')
<!-- 404----------------------------------->
<div class="container-main">
    <div class="col-12">
        <div id="content">
            <div class="d-404">
                <div class="d-404-title">
                    <h1>دسترسی به این صفحه ممکن نیست</h1>
                </div>
                <div class="d-404-image">
                    <img class="w-25" src="{{asset('assets/images/403.png')}}">
                </div>

                <div class="d-404-actions">
                    <a class="btn btn-light" href="{{route('FrontEnd.home.index')}}" >صفحه اصلی</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- 404----------------------------------->
@endsection

@push('scripts')


@endpush
