@extends('layouts-dashboard.master')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-2">
        <h2> إدارة تفاصيل الرحلة {{ $trip->title }}</h2>
        <a href="{{ route('provider.trip-details.create', ['trip_id' => $trip->id]) }}" class="btn btn-secondary">إضافة جزء
            رحلة </a>
    </div>

    </div>
    <div class="container">
        <div class="row">
            <div class="col-9">

                @if ($trip->tripDetails->isEmpty())
                    <div class="text-center mb-5">
                        <img src="{{ asset('assets/images/no-data.jpg') }}" alt="" class="w-50 rounded rounded-5">
                    </div>
                @else
                    <table class="table table-bordered table-striped table-hover table-condensed">
                        <tr class="table-secondary">
                            <th> العنوان </th>
                            <th> تاريخ البدء</th>
                            <th> تاريخ الانتهاء </th>
                            <th> المكان </th>

                            <th> ملاحظة </th>
                            <th> الوظائف</th>
                        </tr>

                        @foreach ($trip->tripDetails as $tripDetail)
                            <tr>
                                <td>{{ $tripDetail->title }}</td>
                                <td>{{ $tripDetail->start_date }}</td>
                                <td>{{ $tripDetail->end_date }}</td>
                                <td>{{ $tripDetail->place->name_ar }}</td>
                                <td>{{ $tripDetail->note }}</td>
                                <td class="text-nowrap text-center">
                                    <button class="btn btn-outline-info"
                                        onclick="">
                                        <i data-feather="edit"></i>
                                </button>
                                    <form action="{{ route('provider.trip-details.destroy', $tripDetail) }}" method="post"
                                        class="d-inline-block"
                                        onsubmit="return  confirm('Are you sure to delete {{ $tripDetail->title }}')">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-sm btn-outline-danger"><i data-feather="trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </table>
                @endif

            </div>
            <div class="col-3">
                <div id="form-create-container"></div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script></script>
@endpush
