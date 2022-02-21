@extends('layouts.Dashboard.master')

@section('title', 'آپلود محصولات')

@push('styles')
    <link rel="stylesheet">{{asset('css/Dashboard/plugins/global/plugins.bundle.rtl.css')}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
@endpush

{{--@section('error', true);--}}
{{--@section('success', true);--}}

@section('content')
    <div class="container mt-5 text-center">
        <h2 class="mb-4">
            آپلود محصولات
        </h2>
        <form action="{{ route('admin.file-import') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-4" style="max-width: 500px; margin: 0 auto;">
                <div class="custom-file text-left">
                    <input type="file" name="file" class="custom-file-input" id="customFile">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
            </div>
            <button class="btn btn-primary">آپلود</button>
        </form>
    </div>
@endsection
@push('scripts')

@endpush
