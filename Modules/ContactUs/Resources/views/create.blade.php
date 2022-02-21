@extends('layouts.Dashboard.master')

@section('title', 'افزودن تماس با ما')

@section('breadCrumb', \DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs::render('create-contact'))

@section('error', true);

@section('content')
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        <div class="row">
            <div class="col-lg-12">
                <!--begin::Portlet-->
                <div class="kt-portlet">
                    <form action="{{ route('admin.contactus.store') }}" method="post" class="kt-form"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="kt-portlet__head">
                            <div class="kt-portlet__head-label">
                                <h3 class="kt-portlet__head-title">
                                    افزودن تماس با ما
                                </h3>
                            </div>
                        </div>

                        <div class="kt-portlet__body">
                            @include('contactus::partials.form')
                        </div>
                    </form>
                </div>
                <!--end::Portlet-->
            </div>
        </div>
    </div>
@endsection
