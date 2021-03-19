@extends('frontend.main')
@section('title', 'shakils pages')
@section('bg-img')
@include('frontend.nav')
@endsection
@section('content')

  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">

        @foreach($posts as $value)
        <div class="post-preview">
          <a href="{{ url('home/view/'.$value->id ) }}">
           
            <img class="img-fluid" src="{{ URL::to($value->images) }}" alt="">
            <h2 class="post-title">
              {{ $value->title }}
             </h2>
          </a>
          <p class="post-meta">Posted by
            <a href="#">{{ $value->name }}</a>
            on {{ $value->slug }}</p>

        </div>
        @endforeach
       
        <hr>
        {{ $posts->links() }}
        <!-- Pager -->
        <div class="clearfix">
          <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
        </div>
      </div>
    </div>
  </div>

  <hr>














@endsection