@extends('layouts.app')

@section('content')

<div class="container-fluid d-flex flex-column align-items-center"  style="width: 100%; background-color: #e9ecef;">
  @include('partials.student_nav')
</div>

<div class="container-fluid d-flex flex-column align-items-center mt-3"  style="width: 100%;">
    <h5>Home Page</h5>

    <!-- show user name -->
     <!-- <h2>{{ Auth::guard('student')->user()->name }}</h2>  -->
</div>

@endsection