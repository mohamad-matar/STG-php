@extends('layouts-dashboard.master')
@section('content')
    <h2>إضافة رحلة</h2>   

    <form action="{{ route('provider.trips.store') }}" method="post" class="row" autocomplete="off">
        @csrf      
        <x-input name="title_ar" label="عنوان الرحلة بالعربي" />
        <x-input name="title_en" label="عنوان الرحلة بالانكليزي" />
        <div></div>
        <x-input name="start_date" label="تاريخ البدء" class="datetimepicker"  />
        <x-input name="end_date" label="تاريخ الانتهاء" class="datetimepicker" />

        <x-input  type="number" name="count" label="العدد "  />
        <x-textarea  name="note" label="ملاحظات" />
        
        <div class="text-center my-2">
            <button class="btn btn-secondary">إضافة رحلة </button>
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
