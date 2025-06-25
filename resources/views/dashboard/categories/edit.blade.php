@extends('layouts-dashboard.master')
@section('content')
    <h2>تعديل تصنيف</h2>
   
    <form action="{{ route('admin.categories.update' , $category) }}" method="post" >
        @csrf
        @method('put')
        <x-input name="name_ar" label="الاسم بالعربي" :dbValue="$category->name_ar"/>
        <x-input name="name_en" label=" الاسم بالانكليزي" :dbValue="$category->name_en"/>
        
        <button class="btn btn-secondary">تعديل التصنيف</button>
        <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-secondary">رجوع</a>
    </form>
@endsection