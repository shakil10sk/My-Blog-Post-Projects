@extends('frontend.main')
@section('titile', 'View')
@section('bg-img')
@include('frontend.nav')
@endsection
@section('content')

<div class="container">
    <p>
        <a href="{{ url('/') }}" class="btn btn-info">Home</a>
        <a href="{{ url('view/post') }}" class="btn btn-info">View Post</a>
       </p>
    <ul class="" >
        <li>Title: {{ $view->title }}</li>
        <li>category: {{ $view->name }}</li>
        <li>Slug: {{ $view->slug }}</li>
        <li>Images:<br>
            <img src="{{URL::to( $view->images) }}" alt="Images" class="img-fluid" >
        </li>
        <li>Description: {{ $view->details }}</li>
    </ul>
</div>



@endsection