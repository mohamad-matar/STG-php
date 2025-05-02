@extends('layouts.master')
@section('title', __('stg.home'))
@section('content')
    @include('welcome.cover')
    @include('welcome.statistic')
    @include('welcome.popular')
@endsection
