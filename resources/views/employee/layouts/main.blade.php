@extends('layouts.app')

@section('content')

@include('partials.employee_nav')


<div class="container-fluid d-flex flex-column align-items-center mt-3"  style="width: 100%;">
    @yield('home')
</div>

<div class="container d-flex flex-column align-items-center"  style="width: 100%;">
    @include('partials.footer')
</div>

@endsection