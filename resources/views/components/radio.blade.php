@props(['items',  'name', 'dbValue'])
<div class="mt-0 w-75 mx-auto d-flex justify-content-center gap-4">
    @foreach ($items as $value => $label)
    <div>
            <input class="form-check-input" name="{{ $name }}" type="radio" value="{{ $value }}"
                id="{{ $value }}" @checked($value == $dbValue) {{ $attributes }}>
            <label for="user" class=""> {{ $label }} </label>
    </div>
    @endforeach
</div>
