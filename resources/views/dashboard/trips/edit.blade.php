@extends('layouts-dashboard.master')
@section('content')
    <h2>تعديل رحلة</h2>

    <form action="{{ route('provider.trips.update' , $trip) }}" method="post" class="row">
        @csrf
        @method('put')
        <x-input name="title" label="عنوان الرحلة" :dbValue="$trip->title" />
        <x-input name="start_date" label="تاريخ البدء" :dbValue="$trip->start_date" />
        <x-input name="end_date" label="تاريخ الانتهاء" :dbValue="$trip->end_date" />
        
        <x-textarea  name="note" label="ملاحظة" :dbValue="$trip->note"/>

        <div class="text-center my-2">
            <button class="btn btn-secondary">تعديل رحلة </button>
            <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary">رجوع</a>
        </div>

    </form>
@endsection