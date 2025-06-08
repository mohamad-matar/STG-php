@extends('layouts-dashboard.master')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-2">
        <h2> الأماكن{{ $state }} </h2>
        <a href="{{ route('admin.places.create') }}" class="btn btn-secondary">إضافة مكان </a>
    </div>
    <form action="{{ route('admin.places.index') }}" class="d-flex mb-2">
        <a href="{{ route('admin.places.index') }}" class="btn btn-secondary text-nowrap"> كافة الأماكن </a>
        <input type="text" class="form-control" name="search">
        <button class="btn btn-secondary">بحث</button>
    </form>
    @if ($places->isEmpty())
        <div class="text-center mb-5">
            <img src="{{ asset('assets/images/no-data.jpg') }}" alt="" class="w-50 rounded rounded-5">
        </div>
    @else
        <table class="table table-bordered table-striped table-hover table-condensed">
            <tr class="table-secondary">
                <th> الاسم بالعربي</th>
                <th> الاسم بالانكليزي</th>
                <th> الوصف بالعربي</th>
                <th> الوصف بالانكليزي</th>
                <th> المحافظة</th>
                <th> الصورة الرئيسية </th>
                <th> الوظائف</th>
            </tr>

            @foreach ($places as $place)
                <tr onmouseover="showImages({{ $place->id }})" onmouseout="clearImg()">
                    <td>{{ $place->name_ar }}</td>
                    <td>{{ $place->name_en }}</td>
                    <td>{{ $place->description_ar }}</td>
                    <td>{{ $place->description_en }}</td>
                    <td>{{ $place->province->name_ar }}</td>
                    <td>{{ $place->user->email }}</td>
                    <td class="text-center">
                        <img id="img-review" src="{{ getImgUrl($place->image_id) }}" alt="" width="100"
                            height="75" onclick="openLightbox(this)">
                    </td>
                    <td class="text-nowrap text-center">
                        <a class="btn btn-sm btn-outline-primary" href="{{ route('admin.places.show', $place) }}">
                            إدارة الصور
                        </a>
                        <a class="btn btn-sm btn-outline-info"
                            href="{{ route('admin.places.edit', ['place' => $place]) }}">
                            <i data-feather="edit"></i>
                        </a>
                        <form action="{{ route('admin.places.destroy', $place) }}" method="post" class="d-inline-block"
                            onsubmit="return  confirm('Are you sure to delete {{ $place->name_ar }}')">
                            @csrf
                            @method('delete')
                            <button class="btn btn-sm btn-outline-danger"><i data-feather="trash"></i></button>
                        </form>
                    </td>
                    <td class=d-none>
                        <div id="place-{{ $place->id }}">
                            @foreach ($place->placeShows as $show)
                                <div>{{ getImgUrl($show->image_id) }}</div>
                            @endforeach
                        </div>
                    </td>
                </tr>
            @endforeach

        </table>
        {{ $places->links('pagination::bootstrap-5') }}
        <div class="m-n1">
            <h5 class="text-center text-secondary"> صور المكان </h5>
            <div id="album" class="gallery">
            </div>            
        </div>
        <x-show-image />
    @endif
@endsection
@push('js')
    <script>
        function clearImg() {
            document.getElementById('album').innerHTML = ""
        }

        function showImages(id) {
            const currentImages = Array.from(document.getElementById(`place-${ id }`).children);
            console.log(currentImages)
            const album = document.getElementById('album')
            album.innerHTML = ""
            currentImages.forEach(element => {
                let img = document.createElement('img');
                img.src = element.innerHTML;
                img.classList.add('gallery-item')
                album.appendChild(img)
            });
        }
    </script>
@endpush
