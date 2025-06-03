@extends('layouts.master')
@section('content')
<div class="container mt-5">
    <h1 class="text-center">Search for Items</h1>
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
        <div class="col-md-3">
            <div class="card">
                <img src="${item.image}" class="card-img-top" alt="${item.title}">
                <div class="card-body">
                    <h5 class="card-title">{{  $place->title}}</h5>
                    <p class="card-text">{{  $place->description}} </p>
                    <a href="#" class="btn btn-success">Learn More</a>
                </div>
            </div>
        </div>
        @endforeach 
    </div>
</div>
@endsection