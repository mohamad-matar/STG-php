@extends('layouts.master')
@section('content')
<div class="container my-5">
    <p class="text-center text-success fw-bold fs-3 mt-5">Search for Items</p>
    <div class="row mb-4">
        <div class="col-md-8 offset-md-2">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search..." id="searchInput">
                <button class="btn btn-success" onclick="searchItems()">Search</button>
            </div>
        </div>
    </div>

    <div class="row" id="results">
        @foreach ($places as $place)
        <div class="col-md-3 p-1">
            <div class="card">
                <img src="{{ getImgUrl(  $place->image_id)}}" class="card-img-top" alt="{{ getImgUrl(  $place->image_id)}}">
                <div class="card-body">
                    <h5 class="card-title">{{  $place->title}}</h5>
                    <p class="card-text">{{  $place->description}} </p>
                    <a href="#" class="text-success">vew  More</a>
                </div>
            </div>
        </div>
        @endforeach 
    </div>
</div>
@endsection