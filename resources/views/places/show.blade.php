@extends('layouts.master')
@section('title', $place->name)
@section('content')
    <div class="my-5">
        <div class="p-2 my-3">
            <h1 class="text-center text-success fs-2 my-3">{{ $place->name }}</h1>
            <p class="text-center fs-4">{{ $place->description }}</p>
            <div class="main-img-wrapper">
                <img src="{{ getImgUrl($place->image_id) }}" alt="">
            </div>
        </div>
        <div>
            <h3 class="text-center my-3">@lang('stg.detail-imgs')</h3>
            <div class="container" id="results">
                @foreach ($place->placeshows as $placeshow)
                    <img onmouseover="viewName('{{ $placeshow->name }}')" src="{{ getImgUrl($placeshow->image_id) }}"
                        alt="">
                @endforeach
            </div>
            <p id="view-name" class="fs-5 text-center py-2"></p>
        </div>
    </div>

    <section class="p-3 px-5 mx-5">
        <form action="{{ route('tourist.places.comment', $place->id) }}" method=post class="alert alert-success">
            <h4 class="text-success">
                @lang('stg.add-comment')
            </h4>
            @csrf
            <x-select-arr name="type" label="" :options="['comment','complain']" dbValue="comment"
                col="3" />
            <x-textarea name="comment" label="{{ __('stg.comment') }}" col="12" rows="2" />
            <button class="btn btn-success">@lang('stg.send')</button>            
        </form>
        @foreach ($place->comments as $comment)
            <div class="alert alert-success  bg-white">
                <div class="text-success">
                    {{ $comment->tourist->name }}
                </div>
                <div>
                    {{ $comment->comment }}
                </div>
            </div>
        @endforeach
    </section>
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
