@extends('layouts.master')
@section('content')
    <div id="trips" class="container my-5 pt-4">
        <h1 class="text-center text-success fw-bold fs-2 py-4 "> {{ $title }} </h1>
        <div class="row">
            @foreach ($trips as $trip)
                <div class="trip-wrapper col-4 p-2" data-aos="fade-up">
                    <div class="trip-item">
                        <h3>{{ $trip->title }}</h3>
                        <div class="fs-1"><i class="fa fa-suitcase"></i></div>
                        
                        <p>@lang('stg.start'): {{ $trip->start_date }}</p>
                        <p>@lang('stg.end'): {{ $trip->end_date }}</p>
                        <p>@lang('stg.cost'): 50,000 </p>
                        <p>@lang('stg.remain'): 5 </p>

                        <a class="btn btn-success  " href="{{ route('home.trips.show', ['trip' => $trip]) }}" >
                            @lang('stg.trip-details')
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
