@extends('layouts-dashboard.master')
@section('content')
    <h2>إضافة رابط</h2>

    <form action="{{ route('provider.api-request.store') }}" method="post" class="row">
        @csrf
        <x-input name="title" label="عنوان الطلب" />
        
        <x-select-arr name="method" label="الطريقة" :options="['get','post','put','delete']" required/>        
                 
        <x-input name="path" label="المسار" />

        <x-input name="params" label="أدخل بارمترات بينها &" />

        
        <div class="text-center my-2">
            <button class="btn btn-secondary">إضافة الرابط </button>
            <a href="{{ route('provider.api.edit') }}" class="btn btn-outline-secondary">رجوع</a>
        </div>

    </form>
@endsection

