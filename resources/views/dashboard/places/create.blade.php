@extends('layouts-dashboard.master')

@section('content')
    <h2> مكان جديد </h2>

    {{-- place show template --}}
    <div class="d-none  template alert alert-secondary position-relative row">
        <button type="button" title="حذف الصورة" class="btn-minus btn btn-danger" onclick="removePlaceShow(this)"> - </button>

        <x-image-upload name="image_shows[image_id][]" label="الصورة" required />

        <x-input name="image_shows[name_ar][]" label="وصف الصورة بالعربي" />
        <x-input name="image_shows[name_en][]" label="وصف الصورة  بالانكليزي" />
    </div>

    @php
        if (auth()->user()->type == 'admin') {
            $userType = 'admin';
            $returnPage = 'admin.places.index';
        } else {
            $userType = 'provider';
            $returnPage = 'dashboard';
        }

    @endphp
    <form action="{{ route("$userType.places.store") }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">

            <x-input name="name_ar" label="الاسم بالعربي" />
            <x-input name="name_en" label="الاسم بالانكليزي" />
            <x-input name="description_ar" label="الوصف بالعربي" />
            <x-input name="description_en" label="الوصف بالانكليزي" />

            <x-select name="province_id" label="المحافظة" :options="$provinces" />

            <x-select-multiple name="categories[]" element_id="categories" label="التصنيف" :options="$categories" />

            <x-image-upload name="image_id" label="الصورة الرئيسية" />

            <div id="place-shows">

            </div>
            <div class="mb-5">
                <button class="btn btn-outline-success" type="button" onclick="addPlaceShow()">إضافة صور+ </button>
            </div>
        </div>
        <button class="btn btn-secondary"> إضافة المكان</button>
        <a href="{{ route('admin.places.index') }}" class="btn btn-outline-secondary">رجوع</a>
    </form>
@endsection

@push('js')
    <script>
        function addPlaceShow() {
            const newPlace = document.querySelector('.template').cloneNode(true);
            newPlace.classList.remove('template');
            newPlace.classList.remove('d-none');
            document.getElementById('place-shows').appendChild(newPlace);
        }

        function removePlaceShow(placeShow) {
            placeShow.parentNode.remove();
        }
    </script>
@endpush

@push('css')
    @include('dashboard.css-components.multi-select')
@endpush

@push('js')
    @include('dashboard.js-components.multi-select')

    <script>
        // Initiating the multi-select    
        $(document).ready(function() {
            $("#categories").chosen();
        })
    </script>
@endpush
