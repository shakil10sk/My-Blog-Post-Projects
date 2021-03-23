@extends('frontend.main')
@section('title', 'View Category')
@section('bg-img')
<header class="masthead" style="background-image: url('{{ asset('frontend/img/home-bg.jpg') }}')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <h1>Student View using Eloquent ORM method</h1>
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
    <a href="{{ url('student/create') }}" class="btn btn-info">Add Student</a>
   </p>
   <div class="float-right">
    {{ $students->links() }}
</div>
    <table class="table  table-hover table-dark">
      <thead>
        <tr>
          <th class="text-center">SI</th>
          <th class="text-center">Name</th>
          <th class="text-center">Email</th>
          <th class="text-center">Phone</th>
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
        @foreach($students as $value)
        {{-- @foreach($students as $key => $value) --}}
        <tr>
          {{-- <td class="text-center">{{ $value->id }}</td> --}}
          <td class="text-center">@php echo $i++; @endphp</td>
          {{-- <td class="text-center">{{ ++$key }}</td> --}}
          <td class="text-center">{{ $value->name }}</td>
          <td class="text-center">{{ $value->email }}</td>
          <td class="text-center">{{ $value->phone }}</td>
          <td class="text-center">{{ $value->created_at }}</td>
          <td class="text-center">
            <button class="btn btn-success"><a href="{{ url('student/'.$value->id.'/edit') }}">Edit</a></button>
            <form action="{{ url('student/'.$value->id) }}" method="post">
               @csrf
               @method('DELETE')
                <button class="btn btn-danger" style="submit">Delete</button>
            </form>
            {{-- <button class="btn btn-danger"><a id="delete" href="{{ url('delete/student/'.$value->id) }}">Delete</a></button> --}}
            <button class="btn btn-primary"><a href="{{ url('student/'.$value->id) }}">View</a></button> </td>
        </tr>
        @endforeach

      </tbody>
    </table>
    <div class="float-right">
        {{ $students->links() }}
    </div>

</div>

@endsection
