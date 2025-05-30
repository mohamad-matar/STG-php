@extends('layouts-dashboard.master')
@section('content')
    <h2>تعديل المكان</h2>
   
    <form action="{{ route('admin.places.update' , $place) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <x-input name="name_ar" label="الاسم بالعربي" :dbValue="$place->name_ar"/>
        <x-input name="name_en" label="الاسم بالانكليزي" :dbValue="$place->name_en"/>       
        
        <div class="mb-3">
            <label for="province_id" class="form-label mt-3">المحافظة</label>
            <select name="province_id" id="province_id" class="form-select">
                <option value="" hidden>-- اختر محافظة</option>
                @foreach ($provinces as $province)
                    <option value="{{ $province->id }}" @selected($province->id == old('province_id' , $place->province_id))>{{ $province->name_ar }}</option>
                @endforeach
            </select>
            @error('name')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
       
        <x-input name="image_id[]" type="file"  label="الصور" multiple/>
        

        <button class="btn btn-secondary">تعديل المكان</button>
        <a href="{{ route('admin.places.index') }}" class="btn btn-outline-secondary">رجوع</a>
    </form>
@endsection