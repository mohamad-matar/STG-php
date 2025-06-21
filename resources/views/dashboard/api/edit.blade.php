@extends('layouts-dashboard.master')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-2">
        <h2> الربط </h2>
        <a href="{{ route('provider.api-request.create', ['api_id' => $api]) }}" class="btn btn-secondary">إضافة طلب </a>

    </div>
    <form action="{{ route('provider.api.update') }}" method="post">
        @csrf
        @method('put')
        <x-input type="url" name="url" label="رابط الموقع" :dbValue="$api->url" />
        <button class="btn btn-success"> حفظ رابط الموقع </button>
    </form>
    @if ($api->apiRequests->isEmpty())
        <div class="text-center mb-5">
            <img src="{{ asset('assets/images/no-data.jpg') }}" alt="" class="w-50 rounded rounded-5">
        </div>
    @else
        <table class="table table-bordered table-striped">
            <tr class="table-secondary">
                <th> عنوان الرابط بالعربي</th>
                <th> عنوان الرابط بالانكليزي</th>
                <th> method الطريقة</th>
                <th> path المسار</th>
                <th> بارامترات الرابط </th>
                <th> الوظائف</th>
            </tr>

            @foreach ($api->apiRequests as $apiRequest)
                <tr>
                    <td>{{ $apiRequest->title_ar }}</td>
                    <td>{{ $apiRequest->title_en }}</td>
                    <td>{{ $apiRequest->method }}</td>
                    <td>{{ $apiRequest->path }}</td>
                    <td>{{ $apiRequest->params }}</td>
                    <td class="text-nowrap">
                        <a class="btn btn-outline-info" href="{{ route('provider.api-request.edit', $apiRequest) }}">
                            <i data-feather="edit"></i>
                        </a>
                        <form action="{{ route('provider.api-request.destroy', $apiRequest) }}" method="post"
                            class="d-inline-block"
                            onsubmit="return  confirm('Are you sure to delete {{ $apiRequest->title }}')">
                            @csrf
                            @method('delete')
                            <button class="btn  btn-outline-danger"><i data-feather="trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach

        </table>
    @endif
@endsection
<script></script>
