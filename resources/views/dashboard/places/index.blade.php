@extends('layouts-dashboard.master')
@section('content')
    <div class="d-flex justify-content-between mb-2">
        <h2>{{ $state }} الأمكنة</h2>
        <a href="{{ route('admin.places.create') }}" class="btn btn-secondary">إضافة مكان </a>
    </div>

    @if ($places->isEmpty())
        <div class="text-center mb-5">
            <img src="{{ asset('assets/images/no-data.jpg') }}" alt="" class="w-50 rounded rounded-5">
        </div>
    @else
        <table class="table table-bordered table-striped table-hover">
            <tr class="table-secondary">
                <th> الوصف بالعربي</th>
                <th> الوصف بالانكليزي</th>
                <th> الاسم بالعربي</th>
                <th> الاسم بالانكليزي</th>
                <th> المحافظة</th>
                <th> الصور </th>
                <th> الوظائف</th>
            </tr>

            @foreach ($places as $place)
                <tr onmouseover="showImages({{ $place->id }})" onmouseout="clearImg()">
                    <td>{{ $place->name_ar }}</td>
                    <td>{{ $place->name_en }}</td>
                    <td>{{ $place->description_ar }}</td>
                    <td>{{ $place->description_en }}</td>
                    <td>{{ $place->province->name }}</td>
                    <td>
                        <img id="img-review" src="{{ getImgUrl($place->image_id) }}" alt="" width="100"
                            height="100">
                    </td>
                    <td class="text-nowrap">
                        <a class="btn btn-sm btn-outline-success"
                            href="{{ route('admin.places.show', ['place' => $place]) }}">
                            <i data-feather="eye"></i>
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

        <div>
            <h2 class="text-center text-secondary m-0"> Place Show</h2>
            <div id="album" class="gallery">
            </div>

            <div id="lightbox" class="lightbox" onclick="closeLightbox()">
                <span class="close">&times;</span>
                <img class="lightbox-content" id="lightbox-img">
            </div>
        </div>
    @endif
    {{ $places->links('pagination::bootstrap-5') }}
@endsection
@push('js')
    <script>
        function openLightbox(image) {
            const lightbox = document.getElementById('lightbox');
            const lightboxImg = document.getElementById('lightbox-img');
            lightbox.style.display = 'flex';
            lightboxImg.src = image.src;
        }

        function closeLightbox() {
            const lightbox = document.getElementById('lightbox');
            lightbox.style.display = 'none';
        }


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
