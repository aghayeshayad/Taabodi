@extends('layouts.FrontEnd.master')

@section('title', 'تماس ما')
@push('styles')

@endpush

@section('meta_description')
    <meta name="description" content="@isset($contact->meta_description)@endif">
@endsection

@section('content')
    @include('layouts.FrontEnd.headerFix')

@endsection

@push('scripts')


@endpush
