@extends('layouts-dashboard.master')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-2">
        <h2> {{ $typeAr }} </h2>
    </div>
    <form action="{{ route('admin.comments.index') }}" class="my-3" >
        <input type="hidden" name="type" value="{{ $type }}" >
        <x-radio name="commented_type" :items="[
            'all' => 'الكل',
            'App\Models\Place' => 'أماكن',
            'App\Models\Provider\Provider' => 'مزودي خدمة',
            'App\Models\Trip' => 'رحلات',
        ]" 
        :dbValue="$commentedType"
        onchange="submit()"/>
    </form>
    @if ($comments->isEmpty())
        <div class="text-center mb-5">
            <img src="{{ asset('assets/images/no-data.jpg') }}" alt="" class="w-50 rounded rounded-5">
        </div>
    @else
        <table class="table table-bordered table-striped">
            <tr class="table-secondary">
                <th>#</th>
                <th> اسم  المعلق</th>
                <th> المحتوى</th>
                <th>  نوع المعلق عليه  </th>
                <th>  اسم المعلق عليه  </th>
            </tr>

            @foreach ($comments as $comment)
                <tr>
                    <td>{{ $comment->id }}</td>
                    <td>{{ $comment->tourist->name }}</td>
                    <td>{{ $comment->comment }}</td>
                    <td>{{ $comment->commented_type == 'App\Models\Provider\Provider'?
                         'مزود خدمة' :  'مكان'    }}
                    </td>
                    <td>{{ $comment->commented->name_ar }}</td>
                </tr>
            @endforeach

        </table>
    @endif
@endsection
