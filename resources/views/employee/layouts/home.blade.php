@extends('employee.layouts.main')

@section('home')
<div class="container-fluid p-0">
  
  @component('components.cookie')@endcomponent

  @yield('employee-home')
  
</div>
@endsection
