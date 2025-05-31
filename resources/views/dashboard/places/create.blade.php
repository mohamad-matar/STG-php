@extends('layouts-dashboard.master')

@section('content')
    <h2> مكان جديد </h2>

<<<<<<< HEAD
=======
    {{-- place show template --}}
    <div class="d-none template">
        <x-input name="image_shows[name_ar][]" label="وصف الصورة بالعربي" />
        <x-input name="image_shows[name_en][]" label="وصف الصورة  بالانكليزي" />
        <x-input name="image_shows[image_id][]" type="file" label="الصور" />
    </div>

>>>>>>> 7b3906d90f6a9d2effb4604130aca8c0ab590da3
    <form action="{{ route('admin.places.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <x-input name="name_ar" label="الاسم بالعربي" />
        <x-input name="name_en" label="الاسم بالانكليزي" />
        <x-input name="description_ar" label="الوصف بالعربي" />
        <x-input name="description_en" label="الوصف بالانكليزي" />

        <x-select name="province_id" label="المحافظة" :options="$provinces" />
       
        <x-select-multiple  name="categories[]" element_id="categories" label="التصنيف" :options="$categories" />


        <x-input name="image_id" type="file" onchange="showFile(this)" label="الصورة الرئيسية" />
        <div class="text-center my-1">
            <img id="img-review" src="" alt="" width="50%">
        </div>

        <h4 class="fs-3 text-success fw-bolder">الصور الإضافية</h4>

        <button class="btn btn-secondary my-2" type="button" onclick="addPlaceShow()">+</button>

        <div id="place-shows">
            <div class="alert alert-secondary">
                <x-input name="image_shows[name_ar][]" label="وصف الصورة بالعربي" />
                <x-input name="image_shows[name_en][]" label="وصف الصورة  بالانكليزي" />
                <x-input name="image_shows[image_id][]" type="file" label="الصور" />
            </div>
        </div>
        <button class="btn btn-secondary"> إضافة مكان</button>
        <a href="{{ route('admin.places.index') }}" class="btn btn-outline-secondary">رجوع</a>
    </form>
@endsection

@push('js')
    <script>
        function addPlaceShow() {
            const newPlace = document.querySelector('.template').cloneNode(true);
            newPlace.className = "alert alert-secondary";
            document.getElementById('place-shows').appendChild(newPlace);
        }

        function showFile(input) {
            let file = input.files[0];

            if (file.type && !file.type.startsWith('image/')) {
                console.log('File is not an image.', file.type, file);
                return;
            }
            const reader = new FileReader();
            reader.readAsDataURL(file);
            /** readAsDataURL associate reader with a file and specify the way of reading
             * that file to be base64 encoded string - url representing which can be used directly in image element.*/

            reader.addEventListener('load', () => {
                document.getElementById('img-review').src = reader.result;
            });
            /** When the read operation is finished, the readyState property becomes DONE, * and the `load` event is triggered. 
             * At that time, the result attribute contains the data.*/

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

