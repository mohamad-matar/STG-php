@extends('layouts-dashboard.master')
@section('content')
    <h2>إضافة فرع</h2>
    <form action="{{ route('provider.branches.store') }}" method="post" enctype="multipart/form-data" class="row">
        @csrf

        <x-input name="name_ar" label="الاسم بالعربي" />
        <x-input name="name_en" label="الاسم بالانكليزي" />
        <x-input name="description_ar" label="الوصف بالعربي" />
        <x-input name="description_en" label="الوصف بالانكليزي" />
        <x-select name="place_id" label="المكان" :options="$places" />           

        <x-image-upload name="image_id" label="ًصورة الغلاف" />

        <div class="text-center my-2">
            <button class="btn btn-secondary">إضافة الفرع </button>
            <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary">رجوع</a>
        </div>

    </form>
@endsection
