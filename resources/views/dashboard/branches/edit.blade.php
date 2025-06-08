@extends('layouts-dashboard.master')
@section('content')
    <h2> الفروع </h2>
    <x-contacts-template />

    <form action="{{ route('provider.branches.update', $branch) }}" method="post" enctype="multipart/form-data" class="row">
        @csrf
        @method('put')

        <x-input name="name_ar" :dbValue="$branch->name_ar" label="الاسم بالعربي" />
        <x-input name="name_en" :dbValue="$branch->name_en" label="الاسم بالانكليزي" />
        <x-input name="description_ar" :dbValue="$branch->description_ar" label="الوصف بالعربي" />
        <x-input name="description_en" :dbValue="$branch->description_en" label="الوصف بالانكليزي" />
        <x-select name="place_id" label="المكان" :options="$places" :dbValue="$branch->place_id" />

        <x-image-upload name="image_id" label="ًصورة الغلاف" :dbValue="$branch->image_id" />

        <h4 class="text-success fs-3">معلومات التواصل
            <button type="button" class="btn btn-success" onclick="addContact()">+</button>
        </h4>
        
        <div id="contacts-wrapper">
            <x-contacts-edit :contacts="$contacts" />
        </div>

        <div class="text-center my-2">
            <button class="btn btn-secondary">حفظ الفرع </button>
            <a href="{{ route('provider.branches.index') }}" class="btn btn-outline-secondary">رجوع</a>
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
