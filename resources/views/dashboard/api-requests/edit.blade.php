@extends('layouts-dashboard.master')
@section('content')
    <h2>تعديل رابط</h2>

    <form action="{{ route('provider.api-request.update', $apiRequest) }}" method="post" class="row">
        @csrf
        @method('put')

        <x-input name="title" label="العنوان" :dbValue="$apiRequest->title" />
            
        <x-select-arr name="method" label="الطريقة" :options="['get', 'post', 'put', 'delete']" :dbValue="$apiRequest->method" required />

        <x-input name="path" label="المسار" :dbValue="$apiRequest->path" />
        <x-input name="params" label="أدخل بارمترات بينها &" :dbValue="$apiRequest->params" />

        <div class="text-center my-2">
            <button class="btn btn-secondary">حفظ الطلب </button>
            <a href="{{ route('provider.api-request.index') }}" class="btn btn-outline-secondary">رجوع</a>
        </div>

    </form>
@endsection
