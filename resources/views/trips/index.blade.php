@extends('layouts.master')
@section('title', trans_choice('stg.trip', 2))
@section('content')
    <div id="trips" class="container my-5 pt-4">
        <h1 class="text-center text-success fw-bold fs-2 py-4 "> {{ $title }} </h1>
        <div class="row">
            @foreach ($trips as $trip)
                <div class="trip-wrapper col-md-6 col-lg-4 p-2 position-relative" data-aos="fade-up">
                    <div class="trip-item position-relative">
                        @if ($trip->tourists->count())
                            <div class="position-absolute label">
                                <i class="fa-regular fa-thumbs-up"></i><br>
                                <div class="bg-label">
                                    @lang('stg.joined')
                                </div>
                            </div>
                        @endif
                        <h3>{{ $trip->title }}</h3>
                        <h4>{{ $trip->provider->name }}</h4>
                        <div class="fs-1"><i class="fa fa-suitcase"></i></div>

                        <p>@lang('stg.start'): {{ $trip->start_date }}</p>
                        <p>@lang('stg.end'): {{ $trip->end_date }}</p>
                        <p> <span class="title"> @lang('stg.cost'): </span> {{ $trip->cost }} </p>
                        <p> <span class="title"> @lang('stg.total'): </span> {{ $trip->count }}
                            - <span class="title"> @lang('stg.remain'): </span>
                            {{ $trip->count - $trip->tourists_sum_tourist_tripseat_count }} </p>
                        <p> <span class="title"> @lang('stg.eval'): </span>
                            {{ round($trip->tourists_avg_tourist_tripevaluate, 1) }} </p>
                        <a class="btn btn-success  " href="{{ route('home.trips.show', ['trip' => $trip]) }}">
                            @lang('stg.trip-details')
                        </a>
                        {{-- check if user has joined , so he can evaluate --}}
                        @if ($trip->tourists->count())
                            <button class="btn btn-success text-white" onclick="showForm('eval-{{ $trip->id }}')">
                                @lang('stg.eval')
                            </button>
                        @endif
                    </div>

                    <form action="{{ route('tourist.trips.eval', $trip->id) }}" method=post
                        class="shadow p-2 rounded-2 position-absolute d-none text-center" id="eval-{{ $trip->id }}"
                        onsubmit="getEval('eval-{{ $trip->id }}')">
                        <h3 class="text-success text-center">@lang('stg.eval')</h3>
                        @csrf
                        <input type="hidden" name="trip_id" value="{{ $trip->id }}">
                        <input type="hidden" name="evaluate">

                        <div class="text-center my-3">
                            @for ($i = 0; $i < 5; $i++)
                                <i class="far fa-star" onclick=flipMe(this)></i>
                            @endfor
                        </div>

                        <button class="btn btn-success">@lang('stg.send')</button>
                        <button class="btn btn-outline-success" type=button
                            onclick="hideForm('eval-{{ $trip->id }}')">@lang('stg.back')</button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
@endsection
@push('js')
    <script>
        function flipMe(icon) {
            icon.classList.toggle('text-warning')
        }

        function getEval(frm) {
            const currFrom = document.getElementById(frm)
            const count = currFrom.querySelectorAll('.text-warning').length
            currFrom.evaluate.value = count
            console.log(count)
        }

        function showForm(frm) {
            document.getElementById(frm).classList.remove('d-none')
        }

        function hideForm(frm) {
            document.getElementById(frm).classList.add('d-none')
        }
    </script>
@endpush
