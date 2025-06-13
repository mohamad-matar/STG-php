@extends('layouts.master')
@section('title', __('stg.home'))
@section('content')
    @include('provider.home.home-parts.cover')
    @include('provider.home.home-parts.photos')
    @include('provider.home.home-parts.trips')
@endsection
