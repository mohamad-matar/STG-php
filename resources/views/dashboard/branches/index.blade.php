@extends('layouts-dashboard.master')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-2">
        <h2> الفروع  </h2>
        <a href="{{ route('provider.branches.create') }}" class="btn btn-secondary">إضافة فرع </a>
    </div>
    @if ($branches->isEmpty())
        <div class="text-center mb-5">
            <img src="{{ asset('assets/images/no-data.jpg') }}" alt="" class="w-50 rounded rounded-5">
        </div>
    @else
        <table class="table table-bordered table-striped">
            <tr class="table-secondary">
                <th> اسم الفرع بالعربي</th>
                <th> اسم الفرع بالانكليزي</th>
                <th> وصف الفرع بالعربي</th>
                <th> وصف الفرع بالانكليزي</th>
                <th> المكان</th>
                <th> المحافظة</th>
                <th> صورة الفرع الرئيسية </th>
                <th> الوظائف</th>
            </tr>

            @foreach ($branches as $branch)
                <tr>
                    <td>{{ $branch->name_ar }}</td>
                    <td>{{ $branch->name_en }}</td>
                    <td>{{ $branch->description_ar }}</td>
                    <td>{{ $branch->description_en }}</td>
                    <td>{{ $branch->place?->name_ar }}</td>
                    <td>{{ $branch->place?->province?->name_ar }}</td>
                    <td class="text-center">
                        <x-img-cell :id="$branch->image_id" />
                    </td>
                    <td class="text-nowrap">                        
                        <a class="btn btn-sm btn-outline-primary" href="{{ route('provider.branches.show', $branch) }}">
                            إدارة الصور
                        </a>
                        <a class="btn btn-outline-info"
                            href="{{ route('provider.branches.edit', ['branch' => $branch]) }}">
                            <i data-feather="edit"></i>
                        </a>
                        <form action="{{ route('provider.branches.destroy', $branch) }}" method="post"
                            class="d-inline-block"
                            onsubmit="return  confirm('Are you sure to delete {{ $branch->name_ar }}')">
                            @csrf
                            @method('delete')
                            <button class="btn  btn-outline-danger"><i data-feather="trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach

        </table>
        <x-show-image />

    @endif
@endsection
<script></script>
