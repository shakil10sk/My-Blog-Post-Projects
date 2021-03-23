@extends('frontend.main')
@section('titile', 'View')
@section('bg-img')
@include('frontend.nav')
@endsection
@section('content')

<div class="container">
    <p>
        <a href="{{ url('student') }}" class="btn btn-info">View Student</a>
       </p>
    <ol >

        <li>{{ $data->id }}</li>
        <li>{{ $data->name }}</li>
        <li>{{ $data->email }}</li>
        <li>{{ $data->phone }}</li>

    </ol>
</div>
@endsection
