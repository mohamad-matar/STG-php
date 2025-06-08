@extends('layouts-dashboard.master')
@section('content')
    <h2>إعدادات مزود الخدمة</h2>
    <form action="{{ route('provider.update') }}" method="post" enctype="multipart/form-data" class="row">
        @csrf
        @method('put')

        <x-input name="name_ar" :dbValue="$provider->name_ar" label="الاسم بالعربي" />
        <x-input name="name_en" :dbValue="$provider->name_en" label="الاسم بالانكليزي" />
        <x-input name="description_ar" :dbValue="$provider->description_ar" label="الوصف بالعربي" />
        <x-input name="description_en" :dbValue="$provider->description_en" label="الوصف بالانكليزي" />
        <x-input name="license_number" :dbValue="$provider->license_number" label="رقم الرخصة" />
            <x-select name="place_id" label="المكان" :options="$places" :dbValue="$provider->place_id"/>           

        <x-image-upload name="image_id" label="ًصورة الغلاف" :dbValue="$provider->image_id"/>

        <div class="text-center my-2">
            <button class="btn btn-secondary">حفظ الإعدادات </button>
            <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary">رجوع</a>
        </div>

    </form>
@endsection
