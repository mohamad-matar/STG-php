@extends('layouts-dashboard.master')
@section('content')
    <h2>تعديل رحلة</h2>

    <form action="{{ route('provider.trips.update' , $trip) }}" method="post" class="row">
        @csrf
        @method('put')
        <x-input name="title" label="عنوان الرحلة" :dbValue="$trip->title" />
        <div></div>

        <x-input name="start_date" label="تاريخ البدء" :dbValue="$trip->start_date" class="datetimepicker" />
        <x-input name="end_date" label="تاريخ الانتهاء" :dbValue="$trip->end_date"  class="datetimepicker"/>
        
        <x-textarea  name="note" label="ملاحظات" :dbValue="$trip->note"/>

        <div class="text-center my-2">
            <button class="btn btn-secondary">تعديل رحلة </button>
            <a href="{{ route('provider.trips.index') }}" class="btn btn-outline-secondary">رجوع</a>
        </div>

    </form>
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
