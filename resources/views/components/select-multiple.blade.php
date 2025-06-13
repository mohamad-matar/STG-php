@props(['name', 'element_id', 'label', 'dbValue' => [], 'options' ])
<div class="mb-3 text-right col-md-6">
    <label for="{{ $element_id }}" class="form-label">{{ $label }}</label>
    <select name="{{ $name }}" id="{{ $element_id }}" class="form-select w-100" {{ $attributes }} multiple>
        @foreach ($options as $option)
            <option value="{{ $option->id }}" @selected(in_array($option->id, old($element_id, $dbValue)))>{{ $option->name }}</option>
        @endforeach
    </select>
    <div class="mt-1">
        @error($element_id)
        <div class="text-danger">{{ $message }}</div>
    @enderror
    </div>
</div>
