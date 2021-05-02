@extends('layouts.app')

@section('content')

<div class="d-flex" id="wrapper">
    @include('partials.employee.side-nav')
    <div id="page-content-wrapper">
        @include('partials.employee.top-bar')
        @yield('home')
    </div>
</div>

@endsection