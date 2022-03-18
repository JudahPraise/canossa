@extends('layouts.app')

@section('content')

<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
  @component('components.alerts')
    
  @endcomponent
  @include('partials.admin._sidebar')
  @include('partials.admin._topbar')

  <div class="c-body">

    <main class="c-main">

      @yield('home') 

    </main>

  </div>

</div>


@endsection