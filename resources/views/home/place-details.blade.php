@extends('layouts.master')
@section('content')
    <div class="container my-5">
        <div class="container">
            <img src="{{ getImgUrl($place->image_id) }}" alt="">
        </div>

        <div class="container" id="results">
            @foreach ($place->placeshows as $placeshow)
                <img src="{{ getImgUrl($placeshow->image_id) }}" alt="">
            @endforeach
        </div>
    </div>
@endsection
@push('css')
    <link rel="stylesheet" href="{{ asset('assets/unpkg/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/unpkg/unpkg-normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/unpkg/custom.css') }}">
@endpush
