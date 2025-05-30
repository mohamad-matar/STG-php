@extends('layouts-dashboard.master')
@section('content')
<h1>{{ auth()->user()->type }}</h1>
@endsection