@props(['name',  'label', 'dbValue' => [], 'options' ])
<div class="mb-3 text-right col-md-6">
    <label for="{{ $name }}" class="form-label">{{ $label }}</label>
    <select name="{{ $name }}" id="{{ $name }}" class="form-select w-100" {{ $attributes }} >
        @foreach ($options as $option)
            <option value="{{ $option->id }}" @selected($option->id ==  old($name, $dbValue))>{{ $option->name }}</option>
        @endforeach
    </select>
    <div class="mt-1">
        @error($name)
        <div class="text-danger">{{ $message }}</div>
    @enderror
    </div>
</div>
@push('css')
    @include('dashboard.css-components.multi-select')
@endpush

@push('js')
    @include('dashboard.js-components.multi-select')

    <script>        
        // Initiating the multi-select    
        $(document).ready(function() {
            $("#{{ $name }}").chosen();
        })
    </script>
@endpush

