@extends('layouts.app')

@section('content')

<div class="container-fluid d-flex flex-column align-items-center bg-dark"  style="width: 100%;">
    @include('partials.admin_nav')
</div>

<div class="container-fluid d-flex flex-column align-items-center mt-3"  style="width: 100%;">
    @yield('home')
</div>

<div class="container-fluid d-flex flex-column align-items-center"  style="width: 100%;">
    @include('partials.footer')
</div>

@endsection