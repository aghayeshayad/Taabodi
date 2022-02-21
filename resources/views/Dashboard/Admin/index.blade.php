@extends('layouts.Dashboard.master')
@section('breadCrumb')
    <h3 class="kt-subheader__title">
        داشبورد
    </h3>
    <span class="kt-subheader__separator kt-hidden"></span>
    <div class="kt-subheader__breadcrumbs">
        <a href="{{ route('admin.dashboard.index') }}"
           class="kt-subheader__breadcrumbs-home">
            <i class="flaticon2-shelter"></i>
        </a>
        <span class="kt-subheader__breadcrumbs-separator"></span>
    </div>
@endsection
@section('content')

@endsection
