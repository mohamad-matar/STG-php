@extends('layouts-dashboard.master')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-2">
        <h2> الربط </h2>    
    </div>
    <form action="{{ route('provider.api.update') }}" method="post">
        @csrf
        @method('put')
        <x-input type="url" name="services_url" label="مسار عرض الخدمات" :dbValue="$api->services_url" col="12" />
        <x-input type="url" name="request_url" label="مسار طلب خدمة" :dbValue="$api->request_url" col="12"/>
        <x-input type="url" name="view_url" label="مسار عرض الموقع" :dbValue="$api->request_url" col="12"/>
        <button class="btn btn-success"> حفظ   </button>
    </form>
    
@endsection
<script></script>
