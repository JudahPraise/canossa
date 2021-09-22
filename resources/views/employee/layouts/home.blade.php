@extends('employee.layouts.main')

@section('home')
<div class="container-fluid p-0">
  
  @include('components.cookie')

  @yield('employee-home')
  
</div>
@endsection
