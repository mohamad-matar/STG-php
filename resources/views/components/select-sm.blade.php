@props([
    'name',
    'label' => $name,
    'options' =>[],
    'dbValue' => '',    
])
<div>
    <select name="{{ $name }}" id="{{ $name }}"  {{ $attributes->merge(['class' => 'form-select m-2 ']) }}>
        <option value="" hidden>-- اختر {{ $label }}</option>
        @foreach ($options as $option)
            <option value="{{ $option->id }}" @selected(old($name,$dbValue) == $option->id)>{{ $option->name }}</option>
        @endforeach
    </select>
    @error($name)
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
