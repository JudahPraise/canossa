@extends('employee.layouts.home')

@section('employee-home')
<div class="container-fluid m-0 pl-4 pr-3">

  <div class="row p-3">
      @yield('portfolio')
  </div>

</div>
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/orbitcss/css/orbit.css">
@endsection