@extends('layouts.master')
@section('content')
    <h2>Update Book</h2>
    <form action="{{ route('') }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')

        <x-input name="name_ar" :dbValue="$provider->name_ar" />
        <x-input name="name_en" :dbValue="$provider->name_en" />
        <x-input name="description_ar" :dbValue="$provider->description_ar" />
        <x-input name="description_en" :dbValue="$provider->description_en" />
        <x-input name="license_number" :dbValue="$provider->license_number" />
        <x-input name="cover" type="file" onchange="showFile(this)" />

        <img id="img-review" src="{{ asset('storage/provider-images/' . ($provider->image_id ?? 'no-image.jpeg')) }}"
            alt="" width=75>

        <button class="btn btn-secondary">Save Settings</button>
        <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary">back</a>
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
