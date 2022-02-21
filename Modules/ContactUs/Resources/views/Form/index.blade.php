@extends('layouts.Dashboard.master')

@section('title', 'لیست فرم تماس با ما')
@section('breadCrumb', \DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs::render('list-form-contact'))

@section('content')
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        <div class="kt-portlet kt-portlet--mobile">
            <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                        <i class="kt-font-brand flaticon2-line-chart"></i>
                    </span>
                    <h3 class="kt-portlet__head-title">
                        لیست فرم تماس با ما
                    </h3>
                </div>
            </div>
            <div class="kt-portlet__body">

                <!--begin: Datatable -->
                <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1"
                       data-link="{{ route('admin.form-contact.ajax.list') }}">
                    <thead>
                    <tr>
                        <th style="width: 20px">ردیف</th>
                        <th style="width: 140px">نام</th>
                        <th style="width: 140px">ایمیل</th>
                        <th style="width: 180px">عملیات</th>
                    </tr>
                    </thead>
                </table>

                <!--end: Datatable -->
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    {{--Start datatable scripts--}}
    <script type="text/javascript" src="{{ asset('js/Dashboard/DataTable/DataTable.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            let columns = [
                {data: 'id'},
                {data: 'name'},
                {data: 'email'},
                {data: 'actions'},
            ];
            tables('#kt_table_1', columns).init();
        });
    </script>
    {{--End datatable scripts--}}
@endpush
