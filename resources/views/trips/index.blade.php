@extends('layouts.master')
@section('content')
    <div id="trips" class="container my-5 pt-4">
        <h1 class="text-center text-success fw-bold fs-2 py-4 "> {{ $title }} </h1>
        <div class="row">
            @foreach ($trips as $trip)
                <div class="trip-wrapper col-md-6 col-lg-4 p-2" data-aos="fade-up">
                    <div class="trip-item position-relative">
                        <div class="position-absolute label">
                            <i class="fa-regular fa-thumbs-up"></i><br>
                            <div class="bg-label">
                                @lang('stg.joined')
                            </div>
                        </div>
                        <h3>{{ $trip->title }}</h3>
                        <div class="fs-1"><i class="fa fa-suitcase"></i></div>

                        <p>@lang('stg.start'): {{ $trip->start_date }}</p>
                        <p>@lang('stg.end'): {{ $trip->end_date }}</p>
                        <p>@lang('stg.cost'): 50,000 </p>
                        <p>@lang('stg.remain'): 5 </p>

                        <a class="btn btn-success  " href="{{ route('home.trips.show', ['trip' => $trip]) }}">
                            @lang('stg.trip-details')
                            تفاصيل
                        </a>
                        <button class="btn btn-success text-white" onclick="showForm('eval-{{ $trip->id }}')">
                            @lang('stg.eval')
                        </button>

                    </div>
                    <form action="{{ route('tourist.trips.eval' , $trip->id) }}" method=post class="shadow p-2 rounded-2 position-relative d-none"  
                    id="eval-{{ $trip->id }}" onsubmit="getEval('eval-{{ $trip->id }}')">                        
                        <h3 class="text-success text-center">@lang('stg.eval')</h3>
                        @csrf
                        <input type="hidden" name="trip_id" value="{{ $trip->id }}">
                        <input type="hidden" name="evaluate" >

                        <div class="text-center mt-3">
                            @for ($i = 0; $i < 5; $i++)
                                <i class="far fa-star" onclick=flipMe(this)></i>
                            @endfor
                        </div>
                        <x-textarea name="comment" label="{{ __('stg.comment') }}" col="12" rows="5"/>                       
                        
                        <button class="btn btn-success">@lang('stg.send')</button>
                        <button class="btn btn-outline-success" type=button onclick="hideForm('eval-{{ $trip->id }}')">@lang('stg.back')</button>
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

        function showForm(frm){
            console.log(frm);
            document.getElementById(frm).classList.remove('d-none')
        }

        function hideForm(frm){
            document.getElementById(frm).classList.add('d-none')
        }
        function getEval(frm){
            const currFrom = document.getElementById(frm)
            const count = currFrom.querySelectorAll('.text-warning').length
            currFrom.evaluate.value = count
            console.log(count)            
        }
        
    </script>
@endpush
