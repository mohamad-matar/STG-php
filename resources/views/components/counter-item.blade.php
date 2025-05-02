@props([
    'icon',
    'max',
    'title',
])
<div class="col-4 single-counter">
    <div class="icon">
        <i class="fa {{ $icon }}"></i>
    </div>
    <h3>
        <div class="counter" data-TargetNum="{{ $max }}" data-Speed="2000">0</div>
    </h3>
    <h4>@choice("stg.$title" , 1)</h4>
</div>
