@extends('layouts.Dashboard.master')

@section('title', 'افزودن بنر')

@section('breadCrumb', \DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs::render('create-banner'))

@section('error', true);

@section('content')
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        <div class="row">
            <div class="col-lg-12">
                <!--begin::Portlet-->
                <div class="kt-portlet">
                    <form action="{{ route('admin.banner.store') }}" method="post" class="kt-form"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="kt-portlet__head">
                            <div class="kt-portlet__head-label">
                                <h3 class="kt-portlet__head-title">
                                    افزودن بنر
                                </h3>
                            </div>
                            <div class="kt-portlet__head-toolbar">
                                <div class="kt-portlet__head-wrapper">
                                    <div class="kt-portlet__head-actions">
                                        <div class="row">
                                            @component('Components.Dashboard.Form.Status-switch-case', ['model' => $banner])
                                            @endcomponent
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="kt-portlet__body">
                            @include('banner::partials.form')
                        </div>
                    </form>
                </div>
                <!--end::Portlet-->
            </div>
        </div>
    </div>
@endsection
