@extends('frontend.main')
@section('title', 'Create Category')
@section('bg-img')

<header class="masthead" style="background-image: url('{{ asset('frontend/img/home-bg.jpg') }}')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>Student Insert by Eloquent ORM</h1>
            <span class="subheading">It is Insert by the ELOQUENT ORM METHOD</span>
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
     <a href="{{ url('student') }}" class="btn btn-info">View Student</a>
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
    <h2>Insert Student Details...</h2>

      <form action="/store/student" method="post" name="sentMessage" id="contactForm" novalidate>
        @csrf
        <div class="control-group">
          <div class="form-group floating-label-form-group controls">
            <label for="sname">Student Name</label>
            <input type="text" class="form-control" placeholder="Enter Student Name" name="name" id="sname">
          </div>
        </div>
        <br>
        <div class="control-group">
          <div class="form-group floating-label-form-group controls">
            <label for="semail">student Email</label>
            <input type="text" class="form-control" placeholder="Enter student Email" name="email" id="semail">
          </div>
        </div>
        <br>
        <div class="control-group">
          <div class="form-group floating-label-form-group controls">
            <label for="phone">student phone</label>
            <input type="text" class="form-control" placeholder="Enter student phone" name="phone" id="phone">
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

