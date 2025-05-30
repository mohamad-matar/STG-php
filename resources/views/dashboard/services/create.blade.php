@extends('layouts-dashboard.master')

@section('content')
    <h2> خدمة جديدة </h2>

    

    <form action="{{ route('admin.services.store') }}" method="post" >
        @csrf
        <x-input name="name" label="الاسم" />
        
        <button class="btn btn-secondary"> إضافة خدمة</button>
        <a href="{{ route('admin.services.index') }}" class="btn btn-outline-secondary">رجوع</a>
    </form>
@endsection

