@extends('layouts.Dashboard.master')

@section('title', 'افزودن اسلایدر')
@section('breadCrumb', \DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs::render('create-slider'))
@section('error', true)

@section('content')
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        <div class="row">
            <div class="col-lg-12">
                <!--begin::Portlet-->
                <div class="kt-portlet">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                افزودن اسلایدر
                            </h3>
                        </div>
                    </div>

                    <div class="kt-portlet__body">
                        <form action="{{ route('admin.slider.store') }}" method="post" class="kt-form"
                              enctype="multipart/form-data">
                            @csrf
                            @include('sliders::partials.form')
                        </form>
                    </div>
                </div>
                <!--end::Portlet-->
            </div>
        </div>
    </div>
@endsection
