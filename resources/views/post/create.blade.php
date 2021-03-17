
@extends('frontend.main')
@section('title', 'Create Post')
@section('bg-img')
<header class="masthead" style="background-image: url('{{ asset('frontend/img/post-bg.jpg') }}')">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <div class="site-heading">
          <h1>Create Blog Post</h1>
          <span class="subheading">A Blog Theme by Start Bootstrap</span>
        </div>
      </div>
    </div>
  </div>
</header>
@endsection

@section('content')

<!-- Main Content -->
<div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
      <p>
       <a href="{{ url('create/category') }}" class="btn btn-danger">Add Category</a>
       <a href="{{ url('view/category') }}" class="btn btn-info">View Category</a>
       <a href="{{ url('/view/post') }}" class="btn btn-info">View Post</a>
      </p>
      @if($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach($errors->all() as $value)
            <li>{{ $value }}</li>
          @endforeach
        </ul>
      </div>
      @endif
      {{-- form start --}}
        <form action="/store/post" method="post" enctype="multipart/form-data">
          @csrf
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Title</label>
              <input type="text" class="form-control" placeholder="Enter Post Titile" name="title" id="title">
            </div>
          </div>
          <br>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Category</label>
              <select name="category_id" class="form-control">
                <option value="">Select Category</option>
                @foreach($category as $value)
                <option value="{{ $value->id }}">{{ $value->slug }}</option>
                @endforeach
                
              </select>
            </div>
          </div>
          <br>
          <div class="control-group">
            <div class="form-group border floating-label-form-group controls">
              <label for="image">Post Picture</label>
              <input type="file" class="form-control"  id="image" name="images">
            </div>
          </div>
          <br>
          <div class="control-group">           
            <div class="form-group p-2 border border-dark floating-label-form-group controls">
                <label for="desciption">Post Desciption</label>
              <textarea rows="5" class="form-control" placeholder="Post Desciption" id="desciption" name="details"></textarea>
            </div>
          </div>
          <br>
          <div id="success"></div>
          <button type="submit" class="btn btn-primary" id="sendMessageButton">POST</button>
        </form>
      </div>
    </div>
  </div>
  <hr>

@endsection