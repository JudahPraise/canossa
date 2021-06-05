@extends('layouts.app')

@section('content')

<div class="c-sidebar c-sidebar-light c-sidebar-fixed c-sidebar-lg-show" id="sidebar">

  @include('partials.employee._sidebar')
  @include('partials.employee._topbar')
  
  <div class="c-body">

    <main class="c-main">

      @yield('home') 

    </main>

  </div>

</div>


@endsection