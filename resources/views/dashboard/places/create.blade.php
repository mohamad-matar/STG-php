@extends('layouts-dashboard.master')

@section('content')
    <h2> مكان جديد </h2>

    {{-- place show template --}}
    <div class="d-none  template alert alert-secondary position-relative row">

        <button type="button" title="حذف الصورة" class="btn-minus position-absolute btn btn-danger mb-3" onclick="removePlaceShow(this)"> - </button>
        <x-input name="image_shows[image_id][]" type="file" label="الصورة" required />
        <x-input name="image_shows[name_ar][]" label="وصف الصورة بالعربي" />
        <x-input name="image_shows[name_en][]" label="وصف الصورة  بالانكليزي" />
        
        <div class="text-center mt-1">
            <img id="img-review" class="img-review" src="" alt="" width="50%">
        </div>

    </div>

    <form action="{{ route('admin.places.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">

            <x-input name="name_ar" label="الاسم بالعربي" />
            <x-input name="name_en" label="الاسم بالانكليزي" />
            <x-input name="description_ar" label="الوصف بالعربي" />
            <x-input name="description_en" label="الوصف بالانكليزي" />

            <x-select name="province_id" label="المحافظة" :options="$provinces" />

            <x-select-multiple name="categories[]" element_id="categories" label="التصنيف" :options="$categories" />


            <x-input name="image_id" type="file" onchange="showFile(this , 'main-img')" label="الصورة الرئيسية" />
            <div class="text-center mb-2">
                <img id="img-review" class="img-review main-img" src="" alt="">
            </div>

            <div id="place-shows">

            </div>

            <div class="mb-5">
                <button class="btn btn-outline-success" type="button" onclick="addPlaceShow()">إضافة صور+ </button>
            </div>
            <div>

                <button class="btn btn-secondary"> إضافة مكان</button>
                <a href="{{ route('admin.places.index') }}" class="btn btn-outline-secondary">رجوع</a>
            </div>

        </div>

    </form>
@endsection

@push('js')
    <script>
        let placeShowCount = 0;

        function addPlaceShow() {
            const newPlace = document.querySelector('.template').cloneNode(true);
            const n = placeShowCount;
            newPlace.classList.remove('template');
            newPlace.classList.remove('d-none');
            placeShowCount++;
            newPlace.querySelector('img').classList.add(`order-${n}`);
            newPlace.querySelector('[type="file"]').onchange = function() {
                showFile(this, `order-${n}`)
            };
            document.getElementById('place-shows').appendChild(newPlace);
        }

        function removePlaceShow(placeShow) {
            placeShow.parentNode.remove();
            placeShowCount--;
        }

        function showFile(input, reviewClass) {
            console.log(reviewClass)
            // return ;
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
                document.querySelector(`.${reviewClass}`).src = reader.result;
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
