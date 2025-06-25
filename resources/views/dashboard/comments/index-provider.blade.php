@extends('layouts-dashboard.master')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-2">
        <h2> {{ $typeAr }} </h2>
    </div>
    
    @if ($comments->isEmpty())
        <div class="text-center mb-5">
            <img src="{{ asset('assets/images/no-data.jpg') }}" alt="" class="w-50 rounded rounded-5">
        </div>
    @else
        <table class="table table-bordered table-striped">
            <tr class="table-secondary">
                <th>#</th>
                <th> المحتوى</th>
            </tr>

            @foreach ($comments as $comment)
                <tr>
                    <td>{{ $comment->id }}</td>
                    <td>{{ $comment->comment }}</td>                    
                </tr>
            @endforeach

        </table>
    @endif
@endsection
