@extends('layouts.website.app')
@section('title', __('dashboard.home'))
@section('content')

    @include('website.partial._hero')

    @include('website.partial._services')

    @include('website.partial._most-popular-destinations')

    @include('website.partial._foreign-tourism')

    @include('website.partial._booking-section')

    @include('website.partial._contact-section')

@endsection
