@extends('layouts.master')
@section('title' ,  $providerName )

@section('content')    
    <div class="text-center">
        <h2 class="mt-5 pt-4 text-success">
            <a href="{{ url()->previous() }}" class="text-success">
                <i class="fa fa-arrow-circle-@lang('stg.align')"></i>
            </a>
            {{ $providerName }} - {{ $branch->name }}
        </h2>
        <p class="text-center my-3 fs-4">{{ $branch->description }} </p>

        <img class="cover" src="{{ getImgUrl($branch->image_id) }}" alt="{{ getImgUrl($branch->image_id) }}">
    </div>

    <div id="branch-shows" class="container text-center d-grid mt-5">
        <h2 class="text-success">الصور</h2>
        <div class="gallery mx-auto direction-left">
            @foreach ($branch->branchShows as $i => $branchShow)
                @if ($i == 0)
                @elseif ($i % 4 == 0 && $i != 0)
        </div>
        <div class="gallery mx-auto direction-left">
            @endif
            <img onmouseover="viewName('{{ $branchShow->name }}')" src="{{ getImgUrl($branchShow->image_id) }}" alt="{{ getImgUrl($branchShow->image_id) }}">
            @endforeach
        </div>
    </div>
    <p id="view-name" class="fs-5 text-center py-2"></p>
    
@endsection
@push('css')
    <style>
        body {
            background-color: rgb(249, 245, 239);
        }

        /* provider show album */
        .gallery {
            --s: 320px;
            /* control the size */
            --g: 8px;
            /* control the gap */

            display: grid;
            grid: auto-flow var(--s)/repeat(2, var(--s));
            gap: var(--g);
        }

        .gallery>img {
            width: 100%;
            aspect-ratio: 1;
            cursor: pointer;
            filter: grayscale();
            z-index: 0;
            transition: .25s, z-index 0s .25s;
        }

        .gallery>img:hover {
            width: calc(200% + var(--g));
            filter: grayscale(0);
            z-index: 1;
            --_c: 50%;
            transition: .4s, z-index 0s;
        }

        .gallery>img:nth-child(1) {
            clip-path: circle(var(--_c, 55% at 70% 70%));
            place-self: start;
        }

        .gallery>img:nth-child(2) {
            clip-path: circle(var(--_c, 55% at 30% 70%));
            place-self: start end;
        }

        .gallery>img:nth-child(3) {
            clip-path: circle(var(--_c, 55% at 70% 30%));
            place-self: end start;
        }

        .gallery>img:nth-child(4) {
            clip-path: circle(var(--_c, 55% at 30% 30%));
            place-self: end;
        }

        .direction-left {
            direction: ltr !important;
        }
    </style>
@endpush

@push('js')
    <script>
        function viewName(name) {
            document.getElementById('view-name').innerText = name;
        }
    </script>
@endpush
