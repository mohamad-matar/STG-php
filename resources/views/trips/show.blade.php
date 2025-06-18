@extends('layouts.master')
@section('content')
    <div class="my-5">
        <div class="p-2 my-3">
            <h1 class="text-center text-success">{{ $trip->name }}</h1>
            <p class="text-center fs-3">{{ $trip->description }}</p>
            <div class="main-img-wrapper">
                <img src="{{ getImgUrl($trip->image_id) }}" alt="">
            </div>
        </div>
        <div>
            <h3 class="text-center my-3">@lang('stg.detail-imgs')</h3>
            <div class="container" id="results">
                @foreach ($trip->tripDetails as $tripDetail)
                    <img   src="{{ getImgUrl($tripDetail->place->image_id) }}" alt="">
                @endforeach
            </div>
            <p id="view-name" class="fs-5 text-center py-2"></p>
        </div>
    </div>
@endsection
@push('css')
    <link rel="stylesheet" href="{{ asset('assets/unpkg/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/unpkg/unpkg-normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/unpkg/custom.css') }}">
@endpush
@push('js')
    <script>
        function viewName(name) {
            document.getElementById('view-name').innerText = name;
        }
    </script>
@endpush
