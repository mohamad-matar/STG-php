@extends('layouts-dashboard.master')
@section('content')
    <div class="d-flex justify-content-between mb-2">
        <h2> الخدمات </h2>
        <a href="{{ route('admin.services.create') }}" class="btn btn-secondary">إضافة خدمة </a>
    </div>
   
    @if ($services->isEmpty())
        <div class="text-center mb-5">
            <img src="{{ asset('assets/images/no-data.jpg') }}" alt="" class="w-50 rounded rounded-5">
        </div>
    @else
        <table class="table table-bordered table-striped">
            <tr class="table-secondary">
                <th>id</th>
                <th> اسم الخدمة</th>
                <th> الوظائف</th>
            </tr>

            @foreach ($services as $service)
                <tr>
                    <td>{{ $service->id }}</td>
                    <td>{{ $service->name }}</td>                     
                    <td class="text-nowrap">   
                        <a class="btn btn-sm btn-outline-info" href="{{ route('admin.services.edit', ['service' => $service]) }}">
                        <i data-feather="edit"></i>
                        </a>                    
                        <form action="{{ route('admin.services.destroy', $service) }}" method="post" class="d-inline-block"
                            onsubmit="return  confirm('Are you sure to delete {{ $service->name }}')">
                            @csrf
                            @method('delete')
                            <button class="btn btn-sm btn-outline-danger"><i data-feather="trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach

        </table>
    @endif
    {{ $services->links('pagination::bootstrap-5') }}
@endsection
<script>
    
</script>
