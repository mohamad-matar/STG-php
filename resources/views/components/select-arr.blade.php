@props(['name', 'label' => $name, 'options' => [], 'dbValue' => '' , 'col' => 6])

<div class="my-2 col-md-{{ $col }}">
    <label for="{{ $name }}"> {{ $label }} </label>
    <select id="{{ $name }}" name="{{ $name }}" class="form-select" {{ $attributes }}>
        <option value="" hidden>-- @lang('stg.choose') {{ $label }}</option>

        @foreach ($options as $option)
            <option value="{{ $option }}" @selected(old($name, $dbValue) == $option)>{{ $option }}</option>
        @endforeach
    </select>

    @error($name)
        <div class="text-danger">{{ $message }}</div>
    @enderror

</div>