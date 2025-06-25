@extends('layouts.master')
@section('title', trans_choice('stg.trip', 2))
@section('content')
    <div class="my-5">
        <div class="p-2 mt-5 info">
            <h2 class="text-center text-success py-5">
                <a href="{{ url()->previous() }}" class="text-success"><i class="fa fa-arrow-circle-@lang('stg.align')"></i></a>
                {{ $trip->title }}
            </h2>
            <p> <span class="title"> @lang('stg.start'): </span> {{ $trip->start_date }} </p>
            <p><span class="title"> @lang('stg.end'):</span> {{ $trip->end_date }}</p>
            <p> <span class="title"> @lang('stg.cost'): </span> {{ $trip->cost }} </p>
            <p> <span class="title"> @lang('stg.total'): </span> {{ $trip->count }}
                - <span class="title"> @lang('stg.remain'): </span>
                {{ $trip->count - $trip->tourists_sum_tourist_tripseat_count }} </p>
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

                @foreach ($trip->tripDetails as $tripDetail)
                    <tr class="">
                        <td>{{ $tripDetail->title }} </td>
                        <td>{{ $tripDetail->start_date }} </td>
                        <td>{{ $tripDetail->end_date }} </td>
                        <td>{{ $tripDetail->place?->name }}</td>
                        <td> <img class="img-review" src="{{ getImgUrl($tripDetail->place?->image_id) }}" alt="">
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        <div class="container ">
            <div class="row">
                <form action="{{ route('tourist.trips.join', $trip->id) }}" method="post"
                    class="d-flex align-items-center gap-2 alert alert-warning col-md-6 ">
                    @csrf
                    <x-input type="number" name="seat_count" :label="__('stg.seat-count')" col="9" />
                    <button class="btn btn-success mt-3">@lang('stg.join')</button>
                </form>
            </div>
        </div>
        <section class="container">

            <form action="{{ route('tourist.trips.comment', $trip->id) }}" method=post class="alert alert-success">
                <h4 class="text-success">
                    @lang('stg.add-comment') 
                </h4>
                @csrf
                <x-select-arr name="type" label="" :options="['comment','complain']" dbValue="comment"
                col="3" />
                <x-textarea name="comment" label="{{ __('stg.comment') }}" col="12" rows="2" />
                <button class="btn btn-success">@lang('stg.send')</button>
                <button class="btn btn-outline-success" type=button
                    onclick="hideForm('comment-{{ $trip->id }}')">@lang('stg.back')</button>
            </form>
            @foreach ($trip->comments as $comment)
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
    </div>
@endsection
