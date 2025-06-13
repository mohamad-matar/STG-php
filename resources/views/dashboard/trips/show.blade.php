@extends('layouts-dashboard.master')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-2">
        <h2> إدارة تفاصيل الرحلة {{ $trip->title }}</h2>
        <button onclick="addRow()" class="btn btn-secondary">إضافة جزء رحلة </button>
    </div>

    <div class="container">
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <p> {{ $error }} </p>
            @endforeach
        @endif
        <table id="trip-rows" class="table table-condensed ">
            <tr class="table-secondary">
                <th> العنوان </th>
                <th> تاريخ البدء</th>
                <th> تاريخ الانتهاء </th>
                <th> المكان </th>

                <th> ملاحظة </th>
                <th> الوظائف</th>
            </tr>

            @foreach ($tripDetails as $tripDetail)
                <tr class="">
                    <form action="{{ route('provider.trip-details.update', $tripDetail) }}" method="post">
                        @csrf
                        @method('put')
                        <input type="hidden" name="trip_id" value={{ $trip->id }}>
                        <td> <x-input-sm name="title" :dbValue="$tripDetail->title" /> </td>
                        <td><x-input-sm name="start_date" :dbValue="$tripDetail->start_date" class="datetimepicker"/></td>
                        <td><x-input-sm name="end_date" :dbValue="$tripDetail->end_date" class="datetimepicker" /></td>
                        <td><x-select-sm name="place_id" label="مكان" :dbValue="$tripDetail->place_id" :options="$places" /></td>
                        <td><x-input-sm name="note" :dbValue="$tripDetail->note" /></td>

                        <td class="text-nowrap text-center">
                            <button class="btn btn-primary me-1">حفظ </button>
                    </form>
                    <form action="{{ route('provider.trip-details.destroy', $tripDetail) }}" method="post" autocomplete="off"
                        class="d-inline-block"
                        onsubmit="return  confirm('Are you sure to delete {{ $tripDetail->title }}')">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger">حذف</button>
                    </form>
                    </td>
                </tr>
            @endforeach
            <tr class="">
                <form action="{{ route('provider.trip-details.store') }}" method="post" autocomplete="off">
                    @csrf
                    <input type="hidden" name="trip_id" value={{ $trip->id }}>

                    <td><x-input-sm name="title" /> </td>
                    <td><x-input-sm name="start_date" class="datetimepicker" /></td>
                    <td><x-input-sm name="end_date" class="datetimepicker" /></td>
                    <td><x-select-sm name="place_id" label="مكان" :options="$places" /></td>
                    <td><x-input-sm name="note" /></td>
                    <td class="text-nowrap text-center">
                        <button class="btn btn-success">إضافة </button>
                    </td>

                </form>
            </tr>
        </table>
    </div>
@endsection

@push('css')
<link rel="stylesheet" href="{{ asset('assets-dashboard/datetime-picker/datetime-picker.css') }}">
@endpush


@push('js')

<script src="{{ asset('assets/animatNumbers/jquery3.7.1.js') }}"></script>
<script src="{{ asset('assets-dashboard/datetime-picker/datetime-picker.js') }}"></script>

<script>
    $(".datetimepicker").each(function () {
        $(this).datetimepicker();
    });
</script>
@endpush
