@extends('layouts.app')

@section('content')


<div class="container-fluid d-flex flex-column align-items-center mt-3"  style="width: 100%;">
    <h1>STUDENT PAGE</h1>
    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Logout') }}</a></li>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
      @csrf
    </form>
</div>


@endsection