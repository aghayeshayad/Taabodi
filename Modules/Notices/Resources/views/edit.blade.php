@extends('layouts.Dashboard.master')

@section('title', 'ویرایش خبرنامه')

@section('breadCrumb', \DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs::render('create-notices'))

@section('error', true);

@section('content')
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        <div class="row">
            <div class="col-lg-12">
                <!--begin::Portlet-->
                <div class="kt-portlet">
                    <form action="{{ route('admin.notices.update', $notices -> id) }}" method="post" class="kt-form"
                          enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="PUT">
                        @csrf
                        <div class="kt-portlet__head">
                            <div class="kt-portlet__head-label">
                                <h3 class="kt-portlet__head-title">
                                    ویرایش خبرنامه
                                </h3>
                            </div>
                            <div class="kt-portlet__head-toolbar">
                                <div class="kt-portlet__head-wrapper">
                                    <div class="kt-portlet__head-actions">
                                        <div class="row">
                                            @component('Components.Dashboard.Form.Status-switch-case', ['model' => $notices])
                                            @endcomponent
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="kt-portlet__body">
                            @include('notices::partials.form')
                        </div>
                    </form>
                </div>
                <!--end::Portlet-->
            </div>
        </div>
    </div>
@endsection
