@extends('layouts-dashboard.master')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-2">
        <h2> تفاصيل الرحلة {{ $trip->title }}</h2>
        <div>
            <a class="btn btn-secondary" href="{{ route('admin.trips.index') }}">&leftarrow;</a>
        </div>
    </div>

    <div class="container">
        <table id="trip-rows" class="table ">
            <tr class="table-secondary">
                <th> العنوان بالعربي </th>
                <th> العنوان بالانكليزي </th>
                <th> تاريخ البدء</th>
                <th> تاريخ الانتهاء </th>
                <th> المكان </th>
                <th> ملاحظة </th>
            </tr>

            @foreach ($tripDetails as $tripDetail)
                <tr class="">
                    <td>{{ $tripDetail->name_ar }} </td>
                    <td> {{ $tripDetail->name_en }} </td>
                    <td>{{ $tripDetail->start_date }}</td>
                    <td>{{ $tripDetail->end_date }}</td>
                    <td>{{ $tripDetail->place?->name_ar }} </td>
                    <td>{{ $tripDetail->note }}</td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
