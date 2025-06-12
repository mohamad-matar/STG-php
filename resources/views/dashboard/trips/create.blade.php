@extends('layouts-dashboard.master')
@section('content')
    <h2>إضافة رحلة</h2>   

    <form action="{{ route('provider.trips.store') }}" method="post" class="row">
        @csrf      
        <x-input name="title" label="عنوان الرحلة" />
        <x-input name="start_date" label="تاريخ البدء" />
        <x-input name="end_date" label="تاريخ الانتهاء" />
        <x-textarea  name="note" label="ملاحظة" />
        
        <div class="text-center my-2">
            <button class="btn btn-secondary">إضافة رحلة </button>
            <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary">رجوع</a>
        </div>

    </form>
@endsection