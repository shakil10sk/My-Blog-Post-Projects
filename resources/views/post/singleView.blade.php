@extends('frontend.main')
@section('titile', 'View')
@section('bg-img')
@include('frontend.nav')
@endsection
@section('content')

<div class="container">
    <p>
        <a href="{{ url('view/post') }}" class="btn btn-info">View Post</a>
       </p>
    <ol >

        <li>Category Slug:-> {{ $view->slug }}</li>
        <li>Post Title:-> {{ $view->title }}</li>
        <li>Post Description:-> {{ $view->details }}</li>
        <li>Images:-> <br>
            <img src="{{URL::to( $view->images) }}" alt="Images"></li>
        
    
    </ol>
</div>



@endsection