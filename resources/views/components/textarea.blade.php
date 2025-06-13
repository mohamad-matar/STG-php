@props(['name', 'label' => $name, 'dbValue' => '', 'col' => 6])
<div class="mb-3 col-md-{{ $col }}">
    <label for="{{ $name }}" class="form-label">{{ $label }}</label>
    <textarea name="{{ $name }}" id="{{ $name }}"
        {{ $attributes->merge(['class' => 'form-control p-1' . ($errors->has($name) ? 'is-invalid' : '')]) }}>{{old($name, $dbValue)}}</textarea>
    @error($name)
        <div class="text-danger pt-1">
            {{ $message }}
        </div>
    @enderror
</div>
