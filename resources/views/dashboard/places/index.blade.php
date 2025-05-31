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
        <table class="table table-bordered table-striped">
            <tr class="table-secondary">
                <th>الوصف بالعربي</th>
                <th> الوصف بالانكليزي</th>
                <th>الاسم بالعربي</th>
                <th> الاسم بالانكليزي</th>
                <th> المحافظة</th>
                <th> الصور </th>
                <th> الوظائف</th>
            </tr>

            @foreach ($places as $place)
                <tr>
                    <td>{{ $place->name_ar }}</td>
                    <td>{{ $place->name_en }}</td>
                    <td>{{ $place->description_ar }}</td>
                    <td>{{ $place->description_en }}</td>                    
                    <td>{{ $place->province->name }}</td>
                     <td>
                        <a href="" onclick="showImages({{ $place->id }})">
                            <img id="img-review" src="{{ getImgUrl($place->image_id) }}" alt=""
                            width="100" height="100">
                        </a>
                    </td>
                    <td class="text-nowrap">   
                        <a class="btn btn-sm btn-outline-info" href="{{ route('admin.places.edit', ['place' => $place]) }}">
                        <i data-feather="edit"></i>
                        </a>                    
                        <form action="{{ route('admin.places.destroy', $place) }}" method="post" class="d-inline-block"
                            onsubmit="return  confirm('Are you sure to delete {{ $place->name_ar }}')">
                            @csrf
                            @method('delete')
                            <button class="btn btn-sm btn-outline-danger"><i data-feather="trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach

        </table>
    @endif
    {{ $places->links('pagination::bootstrap-5') }}
@endsection
<script>
    
</script>
