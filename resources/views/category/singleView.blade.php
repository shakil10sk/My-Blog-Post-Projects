@extends('frontend.main')
@section('titile', 'View')
@section('bg-img')
@include('frontend.nav')
@endsection
@section('content')

<div class="container">
    <p>
        <a href="{{ url('view/category') }}" class="btn btn-info">View Category</a>
       </p>
    <ol >

        <li>{{ $dat->id }}</li>     
        <li>{{ $dat->name }}</li>
        <li>{{ $dat->slug }}</li>
    
    </ol>
</div>







@endsection