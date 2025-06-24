@extends('layouts.master')
@section('title' ,  $categoryName )
@section('content')
    <div class="container my-5 pt-4">
        <h1 class="text-center text-success fw-bold fs-2 ">{{ $categoryName }} @lang('stg.places') </h1>
        <p class="text-center fs-5">
            @if ($search)
                 [{{ $search }}] 
                <a class="ms-3 text-decoration-underline text-success"  href="{{ route('home.places.index', ['category_id' => $category_id]) }}">@lang('stg.all')
                    {{ $categoryName }}</a>
            @endif
        </p>

        <div class="row mb-4">
            <div class="col-md-8 offset-md-2 ">
                <div class="input-group">
                    <form action="{{ route('home.places.index') }}" class="d-flex w-100">
                        <input type="text" name="search" class="w-100" placeholder="Search..." id="searchInput">
                        <input type="hidden" name="category_id" value="{{ $category_id }}">
                        <button class="btn btn-success">Search</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="row" id="results">
            @foreach ($places as $place)
                <div class="col-md-3 p-1">
                    <div class="card">
                        <img src="{{ getImgUrl($place->image_id) }}" class="card-img-top"
                            alt="{{ getImgUrl($place->image_id) }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $place->name }}</h5>
                            <p class="card-text">{{ $place->description }} </p>
                            <a href="{{ route('home.places.show', $place) }}" class="text-success">@lang('stg.more')</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
