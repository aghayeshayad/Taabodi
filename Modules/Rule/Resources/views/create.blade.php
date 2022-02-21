@extends('layouts.Dashboard.master')

@section('title', 'افزودن قانون')
@section('breadCrumb', Breadcrumbs::render('create-rule'))
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
                                افزودن قانون
                            </h3>
                        </div>
                    </div>

                    <div class="kt-portlet__body">
                        <form action="{{ route('admin.rule.store') }}" method="post" class="kt-form"
                              enctype="multipart/form-data">
                            @csrf
                            @include('rule::partials.form')
                        </form>
                    </div>
                </div>
                <!--end::Portlet-->
            </div>
        </div>
    </div>
@endsection