@extends('layouts-dashboard.master')
@section('content')

@if ($userType == 'admin')

<div class="card-wrapper container-fluid">

    <div class="row g-3 mt-5">

        <!-- news count -->
        <div class="col-xl-3 col-md-6">
            <div class="card border border-5  border-top-0 border-bottom-0 shadow p-3 pb-0">
                <div class="row align-items-center h6">
                    <div class="col-9 text-uppercase">
                        <div class="text-secondary">  عدد الأماكن السياحية</div>
                        <div class="h3">{{ $placesCount }}</div>
                    </div>
                    <div class="col-3">
                        <i class="align-middle text-danger" data-feather="clipboard"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card border border-5  border-top-0 border-bottom-0 shadow p-3 pb-0">
                <div class="row align-items-center h6">
                    <div class="col-9 text-uppercase">
                        <div class="text-secondary"> عدد مزودي الخدمة </div>
                        <div class="h3">{{ $providersCount }}</div>
                    </div>
                    <div class="col-3 text-warning">
                        <i class="align-middle" data-feather="navigation"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card border border-5  border-top-0 border-bottom-0 shadow p-3 pb-0">
                <div class="row align-items-center h6">
                    <div class="col-9 text-uppercase">
                        <div class="text-secondary"> عدد الزوار </div>
                        <div class="h3">{{ $touristsCount }}</div>
                    </div>
                    <div class="col-3 text-info">
                        <i class="align-middle" data-feather="file-text"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card border border-5  border-top-0 border-bottom-0 shadow p-3 pb-0">
                <div class="row align-items-center h6">
                    <div class="col-9 text-uppercase">
                        <div class="text-secondary"> عدد الرحلات </div>
                        <div class="h3">{{ $tripsCount }}</div>
                    </div>
                    <div class="col-3 text-success">
                        <i class="align-middle" data-feather="heart"></i>
                    </div>
                </div>
            </div>
        </div>
       


    </div>
    <div class="text-center">
        <img src="{{ asset('assets/images/logo/logo-cover.png') }}" alt="">
    </div>
</div>
@elseif ($userType == 'provider')
@php  $provider = auth()->user()->provider @endphp
<div class="text-center">
    <h1 class="mt-4  text-success fs-1">{{ $provider->name_ar }}</h1>
    <p class="text-center my-3 fs-2">{{ $provider->description_ar }} </p>

    <img class="cover w-100 vh-100" src="{{ getImgUrl($provider->image_id) }}" alt="{{ getImgUrl($provider->image_id) }}">
</div>


@endif

@endsection