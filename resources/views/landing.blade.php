@extends('layouts.app')
@section('title', 'Cetako - Printing, Advertising & Packaging')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/landing.css') }}">
@endsection

@section('content')
@include('partials.hero')
@include('partials.clients')
@include('partials.about')
@include('partials.services')
@include('partials.workflow')
@include('partials.stats')
@include('partials.advantages')
@include('partials.testimonials')
@include('partials.faq')
@include('partials.cta')
@endsection

@section('footer')
@include('partials.footer')
@endsection

@section('scripts')
<script src="{{ asset('js/landing.js') }}"></script>
@endsection
