@extends('layouts.app')

@section('content')

@include('partials.student_nav')


<div class="container-fluid d-flex flex-column align-items-center mt-3"  style="width: 100%;">
    <h5>Home Page</h5>

    <!-- show user name -->
     <!-- <h2>{{ Auth::guard('student')->user()->name }}</h2>  -->
</div>

@endsection