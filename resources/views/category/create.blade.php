@extends('frontend.main')
@section('title', 'Create Category')
@section('bg-img')

<header class="masthead" style="background-image: url('{{ asset('frontend/img/home-bg.jpg') }}')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>Category add</h1>
            <span class="subheading">A Blog Theme by Start Bootstrap</span>
          </div>
        </div>
      </div>
    </div>
  </header>
  <!-- Main Content -->
<div class="container">
  <div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">
    <p>
     <a href="{{ url('view/category') }}" class="btn btn-info">View Category</a>
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
      <form action="/store/category" method="post" name="sentMessage" id="contactForm" novalidate>
        @csrf
        <div class="control-group">
          <div class="form-group floating-label-form-group controls">
            <label>Category Name</label>
            <input type="text" class="form-control" placeholder="Enter Category Name" name="cname" id="cname">
          </div>
        </div>
        <br>
        <div class="control-group">
          <div class="form-group floating-label-form-group controls">
            <label>Slug Name</label>
            <input type="text" class="form-control" placeholder="Enter Slug " name="slug" id="slug">
          </div>
        </div>
        <br>
        <div id="success"></div>
        <button type="submit" class="btn btn-primary" id="sendMessageButton">SUBMIT</button>
      </form>
    </div>
  </div>
</div>
<hr>
@endsection

