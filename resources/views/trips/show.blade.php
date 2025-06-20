@extends('layouts.master')
@section('content')
    <div class="my-5">
        <div class="p-2 my-5 info">
            <h2 class="text-center text-success py-5">{{ $trip->$title }}</h2>
            <p> <span class="title"> @lang('stg.start'): </span> {{ $trip->start_date }} </p>
            <p><span class="title"> @lang('stg.end'):</span> {{ $trip->end_date }}</p>
            <p> <span class="title"> @lang('stg.cost'): </span> {{ $trip->cost }} </p>
            <p> <span class="title"> @lang('stg.remain'): </span> 5 </p>
        </div>
        <div class="container">

            <table id="trip-rows" class="table table-condensed ">
                <tr class="table-secondary">
                    <th> @lang('stg.trip-title') </th>
                    <th> @lang('stg.start')</th>
                    <th> @lang('stg.end')</th>
                    <th> @lang('stg.place') </th>
                    <th> @lang('stg.image') </th>
                </tr>

                @foreach ($tripDetails as $tripDetail)
                    <tr class="">
                        <td>{{ $tripDetail->title }} </td>
                        <td>{{ $tripDetail->start_date }} </td>
                        <td>{{ $tripDetail->end_date }} </td>
                        <td>{{ $tripDetail->place->$name }}</td>
                        <td> <img  class="img-review" src="{{ getImgUrl ($tripDetail->place->image->id) }}" alt="" > </td>
                    </tr>
                @endforeach                
            </table>
        </div>
        <div class="container">
            <form action="{{ route('tourist.trips.join' ,  $trip->id)}}" method="post">
                @csrf
                <x-input name="seat_count" :label="__('stg.seat-count')" col="1" />
                <button class="btn btn-success">@lang('stg.join')</button>
            </form>
        </div>
    </div>
@endsection
