@extends('layouts-dashboard.master')
@section('content')
    
    @if ($providers->isEmpty())
        <div class="text-center mb-5">
            <img src="{{ asset('assets/images/no-data.jpg') }}" alt="" class="w-50 rounded rounded-5">
        </div>
    @else
        <table class="table table-bordered table-striped">
            <tr class="table-secondary">
                <th> اسم المزود بالعربي</th>
                <th> اسم المزود بالانكليزي</th>
                <th> وصف المزود بالعربي</th>
                <th> وصف المزود بالانكليزي</th>
                <th> المحافظة</th>
                <th> المكان</th>                
                <th>  الوظائف</th>
            </tr>

            @foreach ($providers as $provider)
                <tr>
                    <td>{{ $provider->name_ar }}</td>
                    <td>{{ $provider->name_en }}</td>                     
                    <td>{{ $provider->description_ar }}</td>                     
                    <td>{{ $provider->description_en }}</td>  
                    <td>{{ $provider->province->name_ar }}</td>                   
                    <td>{{ $provider->place->name_ar }}</td>                   
                    <td class="text-nowrap">                        
                        <form action="{{ route('admin.providers.accept', $provider) }}" method="post" class="d-inline-block">
                            @csrf
                            @method('patch')
                            <button class="btn btn-sm btn-success">تفعيل </button>
                        </form>
                    </td>
                </tr>
            @endforeach

        </table>
    @endif
@endsection
<script>
    
</script>
