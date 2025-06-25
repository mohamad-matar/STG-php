@extends('layouts-dashboard.master')
@section('content')
    <h2>تعديل خدمة</h2>
   
    <form action="{{ route('admin.services.update' , $service) }}" method="post" >
        @csrf
        @method('put')
        <x-input name="name_ar" label="اسم الخدمة بالعربي" :dbValue="$service->name_ar"/>
        <x-input name="name_en" label="اسم الخدمة بالانكليزي" :dbValue="$service->name_en"/>
        
        <button class="btn btn-secondary">تعديل الخدمة</button>
        <a href="{{ route('admin.services.index') }}" class="btn btn-outline-secondary">رجوع</a>
    </form>
@endsection