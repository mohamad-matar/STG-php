@extends('layouts-dashboard.master')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-2">
        <h2> التصنيفات </h2>
        <a href="{{ route('admin.categories.create') }}" class="btn btn-secondary">إضافة خدمة </a>
    </div>
   
    @if ($categories->isEmpty())
        <div class="text-center mb-5">
            <img src="{{ asset('assets/images/no-data.jpg') }}" alt="" class="w-50 rounded rounded-5">
        </div>
    @else
        <table class="table table-bordered table-striped">
            <tr class="table-secondary">
                <th>id</th>
                <th>  اسم الصنف بالعربي</th>
                <th> اسم الصنف بالانكليزي</th>
                <th> الوظائف</th>
            </tr>

            @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name_ar }}</td>                     
                    <td>{{ $category->name_en }}</td>                     
                    <td class="text-nowrap">   
                        <a class="btn btn-sm btn-outline-info" href="{{ route('admin.categories.edit', ['category' => $category]) }}">
                        <i data-feather="edit"></i>
                        </a>                    
                        <form action="{{ route('admin.categories.destroy', $category) }}" method="post" class="d-inline-block"
                        onsubmit="return  confirm('هل تريد محي سجل الصنف:  {{ $category->name }}')">
                            @csrf
                            @method('delete')
                            <button class="btn btn-sm btn-outline-danger"><i data-feather="trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach

        </table>
    @endif
@endsection
<script>
    
</script>
