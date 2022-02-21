@extends('layouts.Dashboard.master')

@section('title', 'ویرایش سوال')

@section('breadCrumb', \DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs::render('edit-faq'))

@section('error', true);

@section('content')
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        <div class="row">
            <div class="col-lg-12">
                <!--begin::Portlet-->
                <div class="kt-portlet">
                    <form action="{{ route('admin.faq.update', $faq->id) }}" method="post" class="kt-form" enctype="multipart/form-data">
                        @csrf
                        {{method_field('PUT')}}
                        <div class="kt-portlet__head">
                            <div class="kt-portlet__head-label">
                                <h3 class="kt-portlet__head-title">
                                    ویرایش سوال
                                </h3>
                            </div>
                        </div>
                        <div class="kt-portlet__body">
                            @include('faq::partials.form')
                        </div>
                    </form>
                </div>
                <!--end::Portlet-->
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script type="text/javascript" src="{{ asset('js/Dashboard/md-bootstrap.js') }}"></script>
@endpush
