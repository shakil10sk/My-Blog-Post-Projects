@extends('frontend.main')
@section('title', 'About Me')
@section('bg-img')
<!-- Page Header -->
<header class="masthead"
    style="background-image: url('{{ asset('frontend/img/about-bg.jpg') }}')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="page-heading">
                    <h1>About Me</h1>
                    <span class="subheading">This is what I do.</span>
                </div>
            </div>
        </div>
    </div>
</header>

@endsection
@section('content')

<!-- Main Content -->
<div class="container">

    <div class="jumbotron">
        <div class="title">
            <h2 class="text-center">About Me</h2>
        </div>
        <div class="row">

            <div class="col-lg-4">
                <div class="img ">
                    <img class="img-fluid rounded-circle border border-dark text-center d-block"
                        src="{{ asset('frontend/img/altadigi.jpg') }}" alt="shakil">
                </div>
            </div>
            <div class="col-lg-8">
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Laudantium, ducimus in temporibus dolorum
                    consectetur quo earum amet omnis, ipsam odio culpa harum voluptatibus impedit laborum sint, et cum
                    eaque.</p>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quam nobis saepe 
                      illo provident eligendi id aliquid quasi dolorum ipsam dicta.</p>
                    <div class="alert alert-dissmissable alert-success">
                      <button class="close"data-dismiss="alert">&times; </button>
                      Have You Visited My Youtube Channel?
                      <a class="text-primary" href="https://www.youtube.com/channel/UCHOLu1ps5BgoKAKeHvRZVGA" target="_blank">Visit Youtube</a>
                      </div>  
                      <div class="alert alert-dissmisable alert-success">
                        <button class="close" data-dismiss="alert">&times;</button>
                        Have You Visit Follow Me in Facebook...?
                        <a class="text-primary" href="https://www.facebook.com/shakil.khan.3577/" target="_blank">Follow Facebook</a>
                      </div>
            </div>
        </div>
    </div>
</div>
<hr>

@endsection