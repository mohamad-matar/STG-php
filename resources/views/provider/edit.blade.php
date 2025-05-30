@extends('layouts-dashboard.master')
@section('content')
    <h2>إعدادات مزود الخدمة</h2>
    <form action="{{ route('provider.update') }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')

        <x-input name="name_ar" :dbValue="$provider->name_ar" label="الاسم بالعربي" />
        <x-input name="name_en" :dbValue="$provider->name_en" label="الاسم بالانكليزي" />
        <x-input name="description_ar" :dbValue="$provider->description_ar" label="الوصف بالعربي" />
        <x-input name="description_en" :dbValue="$provider->description_en" label="الوصف بالانكليزي" />
        <x-input name="license_number" :dbValue="$provider->license_number" label="رقم الرخصة" />
        <x-input name="image_id" type="file" onchange="showFile(this)" label="ًصورة الغلاف" />
        <div class="text-center my-1">
            <img id="img-review" src="{{ getImgUrl($provider->image_id) }}" alt=""
                width="50%">
        </div>
        <div class="text-center my-2">
            <button class="btn btn-secondary">Save Settings</button>
            <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary">رجوع</a>
        </div>

    </form>
@endsection

@push('js')
    <script>
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
