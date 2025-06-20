@extends('layouts-dashboard.master')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-2">
        <h2> الرحلات  </h2>
        <a href="{{ route('provider.trips.create') }}" class="btn btn-secondary">إضافة رحلة </a>
    </div>
    @if ($trips->isEmpty())
        <div class="text-center mb-5">
            <img src="{{ asset('assets/images/no-data.jpg') }}" alt="" class="w-50 rounded rounded-5">
        </div>
    @else
        <table class="table table-bordered table-striped">
            <tr class="table-secondary">
                <th> عنوان الرحلة بالعربي</th>
                <th> عنوان الرحلة بالانكليزي</th>                
                <th> تاريخ البدء</th>
                <th> تاريخ الانتهاء </th>

                <th>  الكلفة</th>
                <th> العدد الكامل</th>            
                <th> العدد المتبقي</th>            
                
                <th> ملاحظة</th>            
                <th> الوظائف</th>
            </tr>

            @foreach ($trips as $trip)
                <tr>
                    <td>{{ $trip->title_ar }}</td>
                    <td>{{ $trip->title_en }}</td>

                    <td>{{ $trip->start_date }}</td>
                    <td>{{ $trip->end_date }}</td>

                    <td>{{ $trip->cost }}</td>
                    
                    <td>{{ $trip->count }}</td>
                    <td> remain</td>
                    <td>{{ $trip->note }}</td>
                    <td class="text-nowrap">                        
                        <a class="btn btn-sm btn-outline-primary" href="{{ route('provider.trips.show', $trip) }}">
                            إدارة التفاصيل
                        </a>
                        <a class="btn btn-outline-info"
                            href="{{ route('provider.trips.edit', ['trip' => $trip]) }}">
                            <i data-feather="edit"></i>
                        </a>
                        <form action="{{ route('provider.trips.destroy', $trip) }}" method="post"
                            class="d-inline-block"
                            onsubmit="return  confirm('Are you sure to delete {{ $trip->title }}')">
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
