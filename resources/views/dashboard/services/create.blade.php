@extends('layouts-dashboard.master')

@section('content')
    <h2> خدمة جديدة </h2>

    

    <form action="{{ route('admin.services.store') }}" method="post" >
        @csrf
        <x-input name="name_ar" label="اسم الخدمة بالعربي" />
        <x-input name="name_en" label="اسم الخدمة بالانكليزي" />
        
        <button class="btn btn-secondary"> إضافة خدمة</button>
        <a href="{{ route('admin.services.index') }}" class="btn btn-outline-secondary">رجوع</a>
    </form>
@endsection

