@props(['name', 'label' => $name, 'options' => [], 'dbValue' => ''])

<div class="mt-2 col-md-6">
    <label for="{{ $name }}"> {{ $label }} </label>
    <select id="{{ $name }}" name="{{ $name }}" class="form-select" {{ $attributes }}>
        <option value="" hidden>-- اختر {{ $label }}</option>

        @foreach ($options as $option)
            <option value="{{ $option }}" @selected(old($name, $dbValue) == $option)>{{ $option }}</option>
        @endforeach
    </select>

    @error($name)
        <div class="text-danger">{{ $message }}</div>
    @enderror

</div>