@props([
    'id' 
])
<div>
    <img id="img-review" src="{{ getImgUrl($id) }}" alt="" width="100"
                            height="75" onclick="openLightbox(this)">
</div>
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
