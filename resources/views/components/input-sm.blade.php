@props(['name', 'dbValue' => '', 'type' => 'text'])
<div>
    <input type="{{ $type }}" name="{{ $name }}" value="{{ old($name, $dbValue) }}"
        id="{{ $name }}"
        {{ $attributes->merge(['class' => 'form-control m-2 ' . ($errors->has($name) ? 'is-invalid' : '')]) }}>
    @error($name)
        <div class="text-danger pt-1">
            {{ $message }}
        </div>
    @enderror
</div>
