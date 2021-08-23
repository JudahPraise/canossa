@extends('layouts.app')

@section('content')

<div class="c-sidebar c-sidebar-light c-sidebar-fixed c-sidebar-lg-show" id="sidebar">

  @include('partials.medical-record._sidebar')
  @include('partials.medical-record._topbar')
  
  <div class="c-body">

    <main class="c-main pt-0"  style="background-color: #F3F3F3">

      @yield('home') 

    </main>

  </div>

</div>


@endsection