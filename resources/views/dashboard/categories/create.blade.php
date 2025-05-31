@extends('layouts-dashboard.master')

@section('content')
    <h2> تصنيف جديد </h2>

    

    <form action="{{ route('admin.categories.store') }}" method="post" >
        @csrf
        <x-input name="name" label="الاسم" />
        
        <button class="btn btn-secondary"> إضافة تصنيف</button>
        <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-secondary">رجوع</a>
    </form>
@endsection

