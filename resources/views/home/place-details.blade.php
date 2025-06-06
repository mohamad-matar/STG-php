@extends('layouts.master')
@section('content')
    <div class="my-5">
        <div class="p-2 my-3">
            <h1 class="text-center text-success">{{ $place->name_ar }}</h1>
            <p class="text-center fs-3">{{ $place->description_ar }}</p>
            <div class="main-img-wrapper">
                <img src="{{ getImgUrl($place->image_id) }}" alt="">
            </div>
        </div>
        <div>
            <h3 class="text-center my-3">الصور التفصيلية</h3>
            <div class="container" id="results">
                @foreach ($place->placeshows as $placeshow)
                    <img onmouseover="viewName('{{ $placeshow->name_ar }}')"  src="{{ getImgUrl($placeshow->image_id) }}" alt="">
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
