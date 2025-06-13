@extends('layouts-dashboard.master')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-2">
        <h2> إدارة تفاصيل الرحلة {{ $trip->title }}</h2>
        <button onclick="addRow()" class="btn btn-secondary">إضافة جزء رحلة </button>
    </div>

    <div class="container">
        <form action="" id="change-form">
            <table id="trip-rows" class="table table-bordered table-striped table-hover table-condensed">
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
                            <button class="btn btn-outline-info" onclick="">
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
        </form>
    </div>

    <div>
        <table id="trip-rows">
            {{-- <tbody id="trip-rows"> --}}
            <tr class="template d-none">
                <td><x-input label="" name="title" col="12" /> </td>
                <td><x-input label="" name="start_date" col="12" /> </td>
                <td><x-input label="" name="end_date" col="12" /> </td>
                <td><x-select label="" name="place" :options="$places" col="12" /> </td>
                <td><x-input label="" name="note" col="12" /> </td>
                <td class="text-nowrap text-center">
                    <button class="btn btn-outline-secondary" type="button" onclick="killMe(this)">-</button>
                    <button class="btn btn-secondary">إضافة </button>
                </td>

            </tr>
        </table>
    </div>
@endsection
@push('js')
    <script>
        function killMe(btn) {
            btn.parentNode.parentNode.remove()
        }

        function addRow() {
            const row = document.querySelector('.template').cloneNode(true)
            row.classList.remove('template')
            row.classList.remove('d-none')
            const tbl = document.getElementById('trip-rows').appendChild(row)

            document.getElementById("change-form").action = "{{ route('provider.trip-details.store') }}"
        }
    </script>
@endpush
