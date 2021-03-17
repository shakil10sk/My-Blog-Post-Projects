@extends('frontend.main')
@section('title', 'View Posts')

@section('bg-img')
<header class="masthead"
    style="background-image: url('{{ asset('frontend/img/post-sample-image.jpg') }}')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <h1>View Blog Post</h1>
                    <span class="subheading">A Blog Theme by Start Bootstrap</span>
                </div>
            </div>
        </div>
    </div>
</header>
@endsection
@section('content')
<div class="container table-responsive">
  <p>
    <a href="{{ url('create/category') }}" class="btn btn-info">Add Category</a>
   </p>
    <table class="table  table-hover table-dark">
      <thead>
        <tr>
          <th class="text-center">SI</th>
          <th class="text-center">Category_id</th>
          <th class="text-center">Title</th>
          <th  class="text-center">details</th>
          <th class="text-center">Image</th>
          <th class="text-center">Created At</th>
        </tr>
      </thead>
      <tbody>
       @php
       $i=1;
      @endphp
        @foreach($posts as $value)
        
        <tr>
          {{-- <td class="text-center">{{ $value->id }}</td> --}}
          <td class="text-center">@php echo $i++; @endphp</td>
          <td class="text-center">{{ $value->slug }}</td>
          <td class="text-center"><p style="width: 200px">{{ $value->title }}</p></td>
          <td class="text-center"><p style="width: 300px">{{ $value->details }}</p></td>
          <td class="text-center"><img src="{{ URL::to($value->images) }}" alt="images" style="height: 100px;width:70px;"></td>
          <td class="text-center">{{ $value->created_at }}</td>
          <td class="text-center">
            <button class="btn btn-success"><a href="{{ url('edit/post/'.$value->id) }}">Edit</a></button>
            <button class="btn btn-danger"><a id="delete" href="{{ url('delete/post/'.$value->id) }}">Delete</a></button>
            <button class="btn btn-primary"><a href="{{ url('single/post/'.$value->id) }}">View</a></button> </td>
        </tr> 
        @endforeach
       
      </tbody>     
    </table>
</div>

{{-- 
<div class="container">
    <div class="row">
      @foreach($posts as $value)
        
     
        <div class="col-lg-8 col-md-10 mx-auto">
            <div class="post-preview">
                <a href="post.html">
                  <img src="{{URL::to($value->images)}}" alt=" images" style="height:350px; width:300px">
                    
                    <h2 class="post-title">
                        {{ $value->title }}
                    </h2>
                    <p>
                      {{ $value->details }}

                    </p>
                </a>
                <p class="post-meta">Posted by
                    <a href="#">Start Bootstrap</a>
                    on September 24, 2019</p>
            </div>
            <hr>
        </div>
        @endforeach
    </div>
</div> --}}


@endsection