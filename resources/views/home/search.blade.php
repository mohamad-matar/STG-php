@extends('layouts.master')
@section('content')
<div class="container my-5">
    <p class="text-center text-success fw-bold fs-3 mt-5">{{ $categoryName }} @lang('stg.places') 
        @if($search)
              - [{{ $search }}]  <a href="{{ route('home.placeSearch' , ['category_id' => $category_id ]) }}">@lang('stg.all') {{ $categoryName }}</a>
        @endif
    </p>
    <div class="row mb-4">
        <div class="col-md-8 offset-md-2">
            <div class="input-group">
                <form action="{{ route('home.placeSearch') }}">                    
                    <input type="text" name="search" class="form-control" placeholder="Search..." id="searchInput">
                    <input type="hidden" name="category_id" value="{{ $category_id }}">
                    <button class="btn btn-success" onclick="searchItems()">Search</button>
                </form>
            </div>
        </div>
    </div>

    <div class="row" id="results">
        @foreach ($places as $place)
        <div class="col-md-3 p-1">
            <div class="card">
                <img src="{{ getImgUrl(  $place->image_id)}}" class="card-img-top" alt="{{ getImgUrl(  $place->image_id)}}">
                <div class="card-body">
                    <h5 class="card-title">{{  $place->name}}</h5>
                    <p class="card-text">{{  $place->description}} </p>
                    <a href="{{ route('home.showPlace' ,$place) }}" class="text-success">@lang('stg.more')</a>
                </div>
            </div>
        </div>
        @endforeach 
    </div>
</div>
@endsection