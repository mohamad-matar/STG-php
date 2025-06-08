@extends('layouts-dashboard.master')
@section('content')
    <h2>إضافة فرع</h2>
    <x-contacts-template />

    <form action="{{ route('provider.branches.store') }}" method="post" enctype="multipart/form-data" class="row">
        @csrf

        <x-input name="name_ar" label="الاسم بالعربي" />
        <x-input name="name_en" label="الاسم بالانكليزي" />
        <x-input name="description_ar" label="الوصف بالعربي" />
        <x-input name="description_en" label="الوصف بالانكليزي" />
        <x-select name="place_id" label="المكان" :options="$places" />           

        <x-image-upload name="image_id" label="ًصورة الغلاف" />

        <h4 class="text-success fs-3">معلومات التواصل
            <button type="button" class="btn btn-success" onclick="addContact()">+</button>
        </h4>
        <div id="contacts-wrapper"></div>
        <div class="text-center my-2">
            <button class="btn btn-secondary">إضافة الفرع </button>
            <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary">رجوع</a>
        </div>

    </form>
@endsection

@push('js')
    <script>
        function addContact() {
            const newContact = document.querySelector('.template').cloneNode(true);
            newContact.classList.remove('template');
            newContact.classList.remove('d-none');
            document.getElementById('contacts-wrapper').appendChild(newContact)
        }
    </script>
@endpush
