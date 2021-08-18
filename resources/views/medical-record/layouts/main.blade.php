@extends('layouts.app')

@section('content')

{{-- <div class="c-sidebar c-sidebar-light c-sidebar-fixed c-sidebar-lg-show" id="sidebar">

  @include('partials.employee._sidebar')
  @include('partials.employee._topbar')
  
  <div class="c-body">

    <main class="c-main pt-0">

      @yield('home') 

    </main>

  </div>

</div> --}}


<main class="c-main pt-0 d-flex justify-content-center align-items-center flex-column">

   <h1>Medical Record</h1>
   <a class="btn btn-danger text-white" onclick="document.getElementById('logoutForm').submit()">
     Logout
    <form action="{{ route('nurse.logout') }}" method="POST" id="logoutForm">@csrf</form>
   </a>

</main>


@endsection