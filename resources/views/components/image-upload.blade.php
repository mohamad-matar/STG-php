@props(['name', 'label' => $name, 'dbValue' => '', 'col' => 6  ])
<div class="mb-3 row">
    <label for="{{ $name }}" class="form-label">{{ $label }}</label>
    <div class="col-md-{{ $col }}">
        <input type="file" onchange="showFile(this)" name="{{ $name }}" value="{{ old($name, $dbValue) }}"
            id="{{ $name }}"
            {{ $attributes->merge(['class' => 'form-control' . ($errors->has($name) ? 'is-invalid' : '')]) }}>
    </div>
    <div class="col-md-6">
        <img id="img-review" class="img-review" src="">
    </div>

    @error($name)
        <div class="text-danger pt-1">
            {{ $message }}
        </div>
    @enderror
</div>

@push('js')
    <script>
        function showFile(input) {
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
                input.parentNode.parentNode.querySelector('img').src = reader.result;
            });
            /** When the read operation is finished, the readyState property becomes DONE, * and the `load` event is triggered. 
             * At that time, the result attribute contains the data.*/

        }
    </script>
@endpush
