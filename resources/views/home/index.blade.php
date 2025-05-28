@extends('layouts.master')
@section('title', __('stg.home'))
@section('content')
    @include('home.home-parts.cover')
    @include('home.home-parts.statistic')
    @include('home.home-parts.popular')
@endsection
