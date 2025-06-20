@props([
    'name',
    'label' => $name,
    'options' =>[],
    'dbValue' => '',
    'col' => 6
])
<div class="mb-3 col-md-6">
    <label for="{{ $name }}" class="form-label">{{ $label }}</label>
    <select name="{{ $name }}" id="{{ $name }}" class="form-select col-{{ $col }}" {{ $attributes }}>
        <option value="" hidden>-- اختر {{ $label }}</option>
        @foreach ($options as $option)
            <option value="{{ $option->id }}" @selected(old($name,$dbValue) == $option->id)>{{ $option->name }}</option>
        @endforeach
    </select>
    @error($name)
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
