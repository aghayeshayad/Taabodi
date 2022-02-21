@extends('layouts.FrontEnd.master')

@section('title', 'سوالات متداول')
@push('styles')

@endpush

@section('meta_description')

@endsection

@section('content')
    @include('layouts.FrontEnd.headerFix')

                    @foreach($faqs as $faq)


                    @endforeach

@endsection

@push('scripts')

@endpush
