@props(['name', 'label' => $name, 'dbValue' => '', 'type' => 'text', 'col' => 6, 'displayError' => 1])
<div class="mb-3 col-md-{{ $col }}">
    <label for="{{ $name }}" class="form-label">{{ $label }}</label>
    <input type="{{ $type }}" name="{{ $name }}" value="{{ old($name, $dbValue) }}" id="{{ $name }}"
        {{ $attributes->merge(['class' => 'form-control ' . ($errors->has($name) ? 'is-invalid' : '')]) }}>
    @if ($displayError)
        @error($name)
            <div class="text-danger pt-1">
                {{ $message }}
            </div>
        @enderror
    @endif
</div>
