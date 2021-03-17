@extends('frontend.main')
@section('title', 'View Category')
@section('bg-img')
<header class="masthead" style="background-image: url('{{ asset('frontend/img/home-bg.jpg') }}')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <h1>Category View</h1>
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
          <th class="text-center">Name</th>
          <th class="text-center">Slug</th>
          <th  class="text-center">created_at</th>
          <th class="text-center">Action</th>
        </tr>
      </thead>
      <tbody>

        {{-- this is a first and direct from table insert data ruls --}}
        {{-- @foreach($data as $key => $value)
          <tr>
            <td>{{ ++$key }}</td>
            <td>{{ $value['name'] }}</td>
            <td>{{ $value['slug'] }}</td>
          </tr>
        @endforeach --}}

        {{-- this is Indirect and secound ruls  from Use of DB class table categories inserted data ruls --}}
        @php
          $i=1;
          @endphp
        @foreach($data as $value)
        
        <tr>
          {{-- <td class="text-center">{{ $value->id }}</td> --}}
          <td class="text-center">@php echo $i++; @endphp</td>
          <td class="text-center">{{ $value->name }}</td>
          <td class="text-center">{{ $value->slug }}</td>
          <td class="text-center">{{ $value->created_at }}</td>
          <td class="text-center">
            <button class="btn btn-success"><a href="{{ url('edit/category/'.$value->id) }}">Edit</a></button>
            <button class="btn btn-danger"><a id="delete" href="{{ url('delete/category/'.$value->id) }}">Delete</a></button>
            <button class="btn btn-primary"><a href="{{ url('single/view/'.$value->id) }}">View</a></button> </td>
        </tr> 
        @endforeach
       
      </tbody>     
    </table>
</div>

@endsection